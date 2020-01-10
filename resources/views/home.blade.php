@extends('layouts.data')
@section('content')
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
            </nav>
        </div>
        <div class="d-flex justify-content-end">
            {{ $posts->links() }}
        </div>

        <div class="d-flex">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="card m-1 mb-2 col-5 box-shadow">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">{{$post->title}}</strong>
                            <h3 class="mb-0">

                            </h3>
                            <div class="mb-1 text-muted">{{$post->created_at}}</div>
                            <p class="card-text mb-2">{{$post->description}}.</p>
                            <a href="{{ route('blog.show',[$post->id]) }}"
                               class="">Read More...</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@stop

