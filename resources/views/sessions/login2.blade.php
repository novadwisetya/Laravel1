@extends("layouts.application")
@section("content")
{!! Form::open() !!}
<div class="form-group">
        {!! Form::label('email', 'Email/Username', array('class' =>'col-lg-3 control-label')) !!}
    <div class="col-lg-4">
        {!! Form::text('email', null, array('class' => 'form-control')) !!}
        <div class="text-danger">
        </div>
    </div>
    <div class="clear">
    </div>
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Password', array('class' => 'col-lg-3 control-label')) !!}
    <div class="col-lg-4">
        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
        <div class="text-danger">
        </div>
    </div>
    <div class="clear">
    </div>
</div>
<div class="form-group">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-4">
        {!! Form::submit('Sig In', array('class' => 'btn btn-raised btn-primary')) !!}
    </div>
    <div class="clear">
    </div>
</div>
{!! Form::close() !!}
@stop

