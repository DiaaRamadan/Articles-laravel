@extends('layouts.app')
@section('content')
<div class = 'container'>
    <table class = 'table table-striped'>
        <tr>
            <td> Title</td>
        </tr>    
        @foreach($articles as $article)
            <tr>
                <td>
                    <a href='\article/read/{{$article->id}}'>{{$article->title}}</a>
                </td>
            </tr>

        @endforeach
    </table>

    <a href='\add'>Add new article</a>
</div>
@endsection