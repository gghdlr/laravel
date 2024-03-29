<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNewComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        //$article = Article::where('id', request('article_id'))->get();
        $article = Article::findOrFail(request('article_id'));
        $comment = new Comment;
        $comment->title = request('title');
        $comment->text = request('text');
        $comment->user_id = Auth::id();
        $comment->article_id = request('article_id');
        $res = $comment->save();
        if($res) Mail::to('alex-yurlov@mail.ru')->send(new MailNewComment($article));
        return redirect()->route('article.show', ['article'=>$comment->article_id, 'comments'=>$comment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comment.edit', ['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'title' => 'required',
            'text' =>  'required'
        ]);
        $comment->title = request('title');
        $comment->text = request('text');
        $comment->save();
        $article = $comment->article_id;
        return redirect()->route('article.show', ['article' => $article]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        $articleId = $comment->article_id;
        return redirect()->route('article.show', ['article' => $articleId]);
    }
}
