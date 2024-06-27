<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->recipe_id = $request->recipe_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('recipes.show', $comment->recipe_id);
    }
}


