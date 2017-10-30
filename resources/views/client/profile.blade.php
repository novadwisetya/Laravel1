@extends('layouts.application')
@section('content')

    <!--Form without header-->
    <div class="card animated fadeInUp" style="width:600px;">
    
        

        <div class="card-body mx-4">

            <div class="text-center">
                <h3 class="pink-text mb-5"><strong>Profile</strong></h3>
            </div>
            
            <div clas="text" style="color:black;"> 
                <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{!! $applicants->name !!}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{!! $applicants->email !!}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>:</td>
                        <td>{!! $applicants->contact !!}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>{!! $applicants->address !!}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td style="color:red;">{!! $applicants->status !!}</td>
                    </tr>
                </tbody>
                </table>
                <button type="button" class="btn btn-primary" onclick="window.history.back()">Back</button>
            </div>
   
    </div>

@endsection