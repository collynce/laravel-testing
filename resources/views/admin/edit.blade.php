@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Edit Blog</h5>
            <div class="card-body ">

                <div class="justify-content-center">

                    {!! Form::model($post, ['method' => 'PUT', 'route' => ['posts.update', $post->id]]) !!}

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('name', 'Blog Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required'=>'']) !!}
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            {!! Form::submit(trans('SUBMIT'), ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
