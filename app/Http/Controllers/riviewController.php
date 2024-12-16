<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class riviewController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
            'review'=>'required|string|max:1000',
        ]);

        $review=Review::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        session()->flash('success', 'Review Anda telah dikirim');

        return redirect()->route(Auth::user()->role . '.home')->with('review', $review);
    }
}
