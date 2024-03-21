<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;

class MainController extends Controller
{
    public function index(){
        $articles = json_decode(file_get_contents(public_path().'/articles.json'));
        return view('main.index', ['articles'=>$articles]);
    }

    public function show($img){
        return view('main.show', ['img'=>$img]);
    }
}
