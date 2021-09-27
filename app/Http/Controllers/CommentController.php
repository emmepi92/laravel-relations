<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|max:65500',
            'author'=> 'required'
        ]);
        
        $comment = new Comment;
        $data= $request->all();
        $comment->text = $data['text'];
        $comment->author = $data['author'];
        $comment->articol_id = $data['id'];
        $comment->save();

        return redirect()->route('articols.show', $data['id']);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()-> route('articols.show', $comment->articol_id);
    }
}
