<?php
namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Place;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('place')->latest()->get();
        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function searchPlace(Request $request)
    {
        $query = $request->get('q');
        $places = Place::where('name','like',"%$query%")->limit(5)->get();

        $places->transform(function ($place) {
            $place->image = $place->image ? asset($place->image) : 'https://via.placeholder.com/400x200';
            return $place;
        });

        return response()->json($places);
    }

    public function store(Request $request)
    {
        $request->validate([
            'place_id'   => 'required|exists:places,id',
            'username'   => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'rating'     => 'required|integer|min:1|max:5',
            'visit_date' => 'required|date',
            'companions' => 'required|string',
            'title'      => 'required|string|max:255',
            'comment'    => 'required|string',
            'agreement'  => 'accepted',
            'photos.*'   => 'nullable|image|max:2048',
        ]);

        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('reviews','public');
            }
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
            'agreement'  => true,
            'photos'     => $photos,
        ]);

        return redirect()->route('review.index')->with('success','Review submitted!');
    }
}
