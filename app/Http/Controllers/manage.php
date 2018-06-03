<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class manage extends Controller
{
    // Function to add Article
    public function addArticle(Request $request) {

        if($request->isMethod('post')){

            $article = new Article;
            $article->title = $request->input('title'); 
            $article->body = $request->input('body');
            $article->user_id = Auth::user()->id ;
            $article->save();
            return redirect('/'); 

        }else{
            return view('manage.article');
        }
    }

    // Function to show all articles
    public function view() {
        $allArticles = Article::all();
        $arr=array('articles' => $allArticles);
        return view('manage.view',$arr);
    }

     // Function to show the article content

     public function read(Request $request,$id){
        if($request->isMethod('post')){

            $comment = new Comment; 
            $comment->comment = $request->input('comment');
            $comment->article_id = $id;
            $comment->save();
        }
        $theArticle = Article::find($id);
        $arr=array('thearticle' => $theArticle);
        return view('manage.read', $arr);
     }
}
