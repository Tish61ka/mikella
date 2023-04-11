<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function all()
    {
        return Review::all();
    }

    public function add(Request $request)
    {
        Review::create([
            'number' => '89673312786',
            'email' => $request->input('email'),
            'text' => $request->input('text'),
        ]);
    }
}
