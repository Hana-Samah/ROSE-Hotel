<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Room;

class ReviewController extends Controller
{
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);
        return view('reviews.create', compact('room'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_name' => 'required|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($validated);

        return redirect()->route('rooms.show', $request->room_id);
    }

    public function index($roomId)
    {
        $room = Room::findOrFail($roomId);
        $reviews = $room->reviews;
        return view('reviews.index', compact('room', 'reviews'));
    }
}
