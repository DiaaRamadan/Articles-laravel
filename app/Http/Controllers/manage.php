<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class manage extends Controller
{
    // Function to add Article
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addArticle(Request $request) {

        if($request->isMethod('post')){

            $this->validate($request,[
                'title'=>'required|min:5|max:50',
                'body'=>'required|min:20'
            ]);

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
            $this->validate($request, [
                'comment'=>'required|min:4',

            ]);

            $comment = new Comment; 
            $comment->comment = $request->input('comment');
            $comment->article_id = $id;
            $comment->save();
        }
        $theArticle = Article::find($id);
        $arr=array('thearticle' => $theArticle);
        return view('manage.read', $arr);
     }

     public function delete($id){
         $comment = Comment::find($id);
         $comment->delete();
        return redirect()->back();
     }

    /*public function editComment(Request $request, $id){
        $this->validate($request, [
            'comment'=>'required|min:4'
        ]);
        $comment = Comment::find($id);
        $arr = array('comment'=>$comment);
        if($request->isMethod('post')){
            $comment->comment = $request->input('comment');
            $comment->save();
            return redirect('view');

        }else{
            return view('editComment', $arr);
        }
    }*/
}
