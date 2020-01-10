@extends('layouts.data')
@section('content')
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
            </nav>
        </div>
            <div class="col">
                <div class=" row">
                    @foreach($posts as $post)

                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">{{$post->title}}</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">Featured post</a>
                            </h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                                lead-in to
                                additional content.</p>
                            <a href="#">Continue reading</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
@stop

