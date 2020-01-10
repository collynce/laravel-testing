@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>{{$post->title}}</h4>
        <br>
        <br>
        <p>{{$post->description}}</p>
    </div>
@endsection
