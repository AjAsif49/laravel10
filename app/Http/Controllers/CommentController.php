<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function CommentCreate(Request $request){
        $comment = Comment::create([
            'comment' => $request->comment,
            'username' => auth()->user()->name,
            'user_id' => auth()->id(),
            ]);
            return redirect('ticket');
    }

    public function showComment()
    {
        $comments = Comment::all();
        return view('comment.index')->with(compact('comments'));
    }
}
