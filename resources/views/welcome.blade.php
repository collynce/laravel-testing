
{!! Form::open(['method' => 'POST', 'route' => ['search']]) !!}


<div class="col-xs-12 form-group">
    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
    {!! Form::text('title', old('title'),  ['class' => 'form-control editor', 'placeholder' => '', 'required'=>'']) !!}
</div>

<div class="col-md-5">
    {!! Form::submit(trans('SUBMIT'), ['class' => 'btn btn-primary btn-block']) !!}
</div>

{!! Form::close() !!}

{{$category}}
