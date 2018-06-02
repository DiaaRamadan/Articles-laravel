<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class manage extends Controller
{
    // Function to add Article
    public function addArticle(Request $request) {

        if($request->isMethod('post')){

            $article = new Article;
            $article->title = $request->input('title'); 
            $article->body = $request->input('body');
            $article->user_id = 1;
            $article->save();
            return redirect('/'); 

        }else{
            return view('manage.article');
        }
    }
}
