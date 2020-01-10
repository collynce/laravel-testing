@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <h5 class="card-header">Posts</h5>
            <div class="card-body ">

                <div class="justify-content-center">

                    <p>
                        <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>

                    </p>


                    <div class="panel panel-default">


                        <div class="panel-body table-responsive">
                            <div class="d-flex justify-content-end">
                                {{ $posts->links() }}
                            </div>

                            <table
                                class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Create Date</th>
                                    <th>Edit Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (count($posts) > 0)
                                    @foreach($posts as $post)
                                        <tr data-entry-id="{{ $post->id }}">
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->name}}</td>
                                            <td>{{ $post->created_at}}</td>
                                            <td>{!! $post->updated_at !!}</td>
                                            <td>

                                                <a href="{{ route('posts.show',[$post->id]) }}"
                                                   class="btn btn-xs btn-primary">View</a>


                                                <a href="{{ route('posts.edit',[$post->id]) }}"
                                                   class="btn btn-xs btn-warning">Edit</a>


                                                {!! Form::open(array(
                                                    'style' => 'display: inline-block;',
                                                    'method' => 'DELETE',
                                                    'onsubmit' => "return confirm('".trans("You are about to delete! Proceed?")."');",
                                                    'route' => ['posts.destroy', $post->id])) !!}
                                                {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No event entries</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
