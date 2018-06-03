@extends('layouts.app')
@section('content')
<div class = 'container'>
    <h1 class = 'text-center'>{{$thearticle->title}}</h1>
    <p> {{$thearticle->body}}</p>

    <div class = 'comments'>
        <table class ='table table-striped'>
            <tr>
                <td> Comments</td>
            </tr>    
            @foreach($thearticle->comments as $c)
                <tr>
                    <td>
                        {{$c->comment}}
                    </td>
                </tr>

            @endforeach
        </table>

         <form action='\article/read/{{$thearticle->id}}' method = 'POST'>
            {{csrf_field()}}
        <!-- Start comment body -->
            <div class = 'form-group'>
                <lablel for='usr'>Make Comment:</label>
                <br>
                <textarea rows='4' cols='50' name='comment' class='form-control'></textarea>
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