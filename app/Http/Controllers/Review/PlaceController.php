<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function create()
    {
        return view('review.places.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $place = new Place();
        $place->name = $request->name;
        $place->location = $request->location;
        $place->description = $request->description;

        if ($request->hasFile('image')) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/places'), $fileName);
            $place->image = 'uploads/places/'.$fileName;
        }

        $place->save();

        return redirect()->route('places.create')->with('success', 'Place added successfully!');
    }
}
