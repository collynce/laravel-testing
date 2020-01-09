@extends('layouts.app')

@section('content')
    <ul>
        @foreach($post as $posts)
            <li>
                {{$posts->name}}
            </li> <li>
                {{$posts->title}}
            </li>
        @endforeach
    </ul>
@endsection
