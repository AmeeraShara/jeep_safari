<?php
namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Place;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{

        public function index()
    {
        // Use paginate() instead of get()
        $reviews = Review::with('place')->latest()->paginate(10); // 10 items per page
        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function searchPlace(Request $request)
    {
        $query = $request->get('q');
        $places = Place::where('name', 'like', "%$query%")->limit(5)->get();

        $places->transform(function ($place) {
            $place->image = $place->image ? asset($place->image) : 'https://via.placeholder.com/400x200';
            return $place;
        });

        return response()->json($places);
    }

    public function store(Request $request)
    {
        try {
            Log::info('Review submission attempt:', $request->all());

            $request->validate([
                'place_id'   => 'required|exists:places,id',
                'username'   => 'required|string|max:255',
                'email'      => 'required|email|max:255',
                'rating'     => 'required|integer|min:1|max:5',
                'visit_date' => 'required|date',
                'companions' => 'required|string|max:255',
                'title'      => 'required|string|max:255',
                'comment'    => 'required|string|min:10',
                'photos.*'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'agreement'  => 'required|accepted',
            ]);

            // Convert photos array to comma-separated string
            $photosString = null;
            if ($request->hasFile('photos')) {
                $photoPaths = [];
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('reviews', 'public');
                    $photoPaths[] = $path;
                }
                $photosString = implode(',', $photoPaths);
            }

            Review::create([
                'place_id'   => $request->place_id,
                'username'   => $request->username,
                'email'      => $request->email,
                'rating'     => $request->rating,
                'visit_date' => $request->visit_date,
                'companions' => $request->companions,
                'title'      => $request->title,
                'comment'    => $request->comment,
                'photos'     => $photosString, // Store as comma-separated string
                'agreement'  => true,
            ]);

            Log::info('Review created successfully');
            return redirect()->route('review.index')->with('success', 'Review submitted!');

        } catch (\Exception $e) {
            Log::error('Review creation failed: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to submit review: ' . $e->getMessage());
        }
    }
}