<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function all()
    {
        return CommentResource::collection(Comment::all());
    }

    public function allcomm(Request $request)
    {
        return CommentResource::collection(Comment::where('id_product', $request->input('id_product'))->get());
    }

    public function addcomm(Request $request)
    {
        Comment::create([
            'id_user' => Auth::user()->id,
            'id_product' => $request->input('id_product'),
            'comment' => $request->input('comment')
        ]);
    }

    public function delcomm(Request $request)
    {
        Comment::where('id', $request->input('id'))->delete();
    }
}