<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('article.index', ['articles'=>$articles]);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'name' =>  'required|min:6',
            'desc' => 'required'
        
        ]);

        $article = new Article;
        $article->date = request('date');
        $article->name = request('name');
        $article->desc = request('desc');
        $article->authorId = 1;
        $article->save();
        return redirect()->route('article.index');
    }

    public function show(Article $article)
    {   
        $comments = Comment::where('article_id', $article->id)->get();
        return view('article.show', ['article'=>$article, 'comments'=>$comments]);
    }

    public function edit(Article $article)
    {
        return view('article.edit', ['article'=>$article]);
    }

    public function update(Request $request, Article $article)
    {
        
        $request->validate([
            'date' => 'required',
            'name' =>  'required|min:6',
            'desc' => 'required'
        
        ]);
        $article->date = request('date');
        $article->name = request('name');
        $article->desc = request('desc');
        $article->authorId = 1;
        $article->save();
        return redirect()->route('article.show', ['article' => $article -> id]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
