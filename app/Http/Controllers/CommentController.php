<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\Comment\CommentStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $comment = new Comment();

        $comment->content = $data['message'];
        $comment->user_id = 1;
        $comment->post_id = $data['post_id'];
        $comment->save();

        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->back();
    }
}
