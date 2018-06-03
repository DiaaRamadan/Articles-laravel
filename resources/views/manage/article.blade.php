@extends('layouts.app')
@section('content')

    <h1 class = 'text-center'>Add Article</h1>
    <div class = 'container'>
      @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class = 'alert alert-danger'>{{$error}}</div>
        @endforeach

    @endif
        <form action='add' method = 'POST'>
            {{csrf_field()}}
        <!-- Start Article title -->
            <div class = "form-group{{$errors->has('title') ? 'has-error' :'' }}">
                <lablel for='usr'>title:</label>
                <br>
                <input type='text' name='title' value='{{Request::old("title")}}' class = 'form-control' />
            </div>
        <!-- End Article name -->
        <!-- Start Article body -->
            <div class = 'form-group'>
                <lablel for='usr'>Article Body:</label>
                <br>
                <textarea rows='4' cols='50' name='body' class='form-control'></textarea>
            </div>
        <!-- End Article body -->
        <!-- Start Article btn -->
        <br>
        <div class = 'form-group'>
                <input type='submit' value='Add Article' class = 'btn btn-primary' />
            </div>
        <!-- End Article btn -->
        </form>
    </div>
@endsection