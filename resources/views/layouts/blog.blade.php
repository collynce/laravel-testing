@extends('layouts.data')
@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">

                </h3>
                <a href="{{ route('posts.edit',[$posts->id]) }}"
                   class="btn btn-xs btn-warning">Edit</a>
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$posts->title}}</h2>
                    <p class="blog-post-meta">{{$posts->created_at}} by <a href="#">{{$posts->author}}</a></p>
                    <p>{{$posts->name}}</p>
                    <hr>
                    <p>{{$posts->description}}</p>
                </div><!-- /.blog-post -->


            </div><!-- /.blog-main -->


        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
