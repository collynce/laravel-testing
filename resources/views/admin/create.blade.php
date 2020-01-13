@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Add New Post</h5>
            <div class="card-body ">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="justify-content-center">
                    {!! Form::open(['method' => 'POST', 'route' => ['posts.store']]) !!}
                    <div class="container">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Post Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            </div>
                            {!! Form::hidden('author_id', Auth::user()->id, old('author')) !!}
                            <div class="col-xs-12 form-group">
                                {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'),  ['class' => 'form-control editor', 'placeholder' => '', 'required'=>'']) !!}
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('category_id', 'Category*', ['class' => 'control-label']) !!}
                                {!! Form::select('category_id', $category, old('category_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description',  old('description'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                {!! Form::submit(trans('SUBMIT'), ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
