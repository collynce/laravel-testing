@extends('layouts.data')
@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">

                </h3>

                <div class="blog-post">
                    <h2 class="blog-post-title">{{$posts->title}}</h2>
                    <p class="blog-post-meta">{{$posts->created_at}} by <a href="#">Mark</a></p>
                    <p>{{$posts->name}}</p>
                    <hr>
                    <p>{{$posts->description}}</p>
                </div><!-- /.blog-post -->

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                </nav>

            </div><!-- /.blog-main -->


        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
