<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta httpequiv="XUACompatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-
    scale=1">

    <title>GeekFarm</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       

</head>
<body style="padding-top:60px;">
<!--bagian navigation-->
@include('shared.head_nav')
<!-- Bagian Content -->
<div class="container clearfix">
    <div class="row row-offcanvas row-offcanvas-left ">  
    <!--Bagian Kanan-->

    <div id="main-content" class="col-xs-12 col-sm-12 main pull-right">

        <div class="panel-body">
        @if (Session::has('error'))
            <div class="session-flash alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        @if (Session::has('notice'))
        <div class="session-flash alert-info">
            {{Session::get('notice')}}
            </div>
        @endif
        @yield("content")
    </div>
</div>
</div>
</div>
<!--
<script src="js/jquery/jquery-2.2.5.js"></script>
<script src="js/bootstrap/bootstrap.js"></script>
<script src="js/material-design/material.js"></script>
<script src="js/material-design/ripples.js"></script>
<script src="js/custom/layout.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>