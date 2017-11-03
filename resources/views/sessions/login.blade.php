@extends("layouts.application")
@section("content")
<div class="col-sm-offset-4 col-sm-8">
{!! Form::open(['route' => 'login.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
  <div class="form-group">
  {!! Form::label('email', 'Email', array('class' => 'control-label col-sm-2', 'style' => 'text-align: left;')) !!}
    <div class="col-sm-4">
    {!! Form::text('email', null, array('class' => 'form-control')) !!}
    </div>
  </div>
  <div class="form-group">
  {!! Form::label('password', 'Password', array('class' => 'control-label col-sm-2', 'style' => 'text-align: left;')) !!} 
    <div class="col-sm-4"> 
    {!! Form::password('password', array('class' => 'form-control')) !!}
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-4">
      <div class="checkbox">

      {!! Form::checkbox('remember', null, array('class' => 'form-control', 'style' => 'width: 140px;')) !!}  
      {!! Form::label('remember', 'Remember Me', array('class' => 'col-lg-6 control-label', 'style' => 'width: 140px;')) !!}
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-4">
        {!! Form::submit('Login', array('class' => 'btn btn-default')) !!}
        {!! link_to(route('reminders.create'), 'Forgot Password?') !!}
    </div>
</div>
{!! Form::close() !!}
</div>
@stop