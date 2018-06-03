@extends('layouts.app')
@section('content')
<div class = 'container'>

    <div class = 'comments'>
        <h1 class = 'text-center'>{{$thearticle->title}}</h1>
        <p> {{$thearticle->body}}</p>
        <table class ='table table-striped'>
            <tr>
                <td> Comments</td>
            </tr>    
            @foreach($thearticle->comments as $c)
                <tr>
                    <td>
                        {{$c->comment}}
                         <span><a href='\delete/{{$c->id}}' class>Delete</a></span>
                    </td>
                </tr>

            @endforeach
        </table>

         @if (count($errors)>0)
            @foreach($errors->all() as $error)
                <div class = 'alert alert-danger'>{{$error}}</div>
            @endforeach
        @endif

         <form action='\article/read/{{$thearticle->id}}' method = 'POST'>
            {{csrf_field()}}
        <!-- Start comment body -->
            <div class = "form-group{{$errors->has('comment') ? 'has-error' :'' }}">
                <lablel for='usr'>Make Comment:</label>
                <br>
                <textarea rows='4' cols='50' name='comment' class='form-control'>{{Request::old('comment')}}</textarea>
            </div>
        <!-- End comment body -->
        <!-- Start comment btn -->
        <br>
        <div class = 'form-group'>
                <input type='submit' value='Add Article' class = 'btn btn-primary' />
            </div>
        <!-- End comment btn -->
        </form>
    </div>
</div>
@endsection