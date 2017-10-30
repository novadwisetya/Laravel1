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




<!-- <div class="col-lg-offset-3 col-lg">
{!! Form::open(['route' => 'login.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group"> 
            <div class="col-lg-6">
                {!! Form::label('email', 'Email', array('class' => 'col-lg-3 control-label', 'style' => 'text-align: left;')) !!}
                {!! Form::text('email', null, array('class' => 'form-control')) !!}
                <div class="text-danger">
                {!! $errors->first('email') !!}
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="form-group">   
            <div class="col-lg-6">
                {!! Form::label('password', 'Password', array('class' => 'col-lg-3 control-label', 'style' => 'text-align: left;')) !!} 
                {!! Form::password('password', array('class' => 'form-control')) !!}
                <div class="text-danger">
                    {!! $errors->first('password') !!}
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                {!! Form::checkbox('remember', null, array('class' => 'form-control', 'style' => 'width: 140px;')) !!}  
                {!! Form::label('remember', 'Remember Me', array('class' => 'col-lg-6 control-label', 'style' => 'width: 140px;')) !!}
               
                <div class="clear">
                </div>
            </div>
            <div class="clear">
            </div>

        </div>
        <div class="form-group">
            <div class="col-lg-6">
                {!! Form::submit('Login', array('class' => 'btn btn-raised btn-primary')) !!}
                <br />
                {!! link_to(route('reminders.create'), 'Forgot Password?') !!}
            </div>
            <div class="clear">
            </div>
        </div>

</div> -->
@stop