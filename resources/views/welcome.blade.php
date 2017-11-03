<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GeekFarm</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/animate.css" >
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/style.css" >
      <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/> -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> 
        <style>
            body{
              background-color:#f4511e;
              position: fixed; 

            }

            /* Step 1: Build thevertical  Animation */
            @-webkit-keyframes aniload {
              from {-webkit-transform:translate(0px, 1000px)}
              to   {-webkit-transform:translate(0px, 0px)}
            }

            @-moz-keyframes aniload {
              from {-moz-transform:translate(0px, 1000px)}
              to   {-moz-transform:translate(0px, 0px)}
            }

            @-ms-keyframes aniload {
              from {-ms-transform:translate(0px, 1000px)}
              to   {-ms-transform:translate(0px, 0px)}
            }

            @-o-keyframes aniload {
              from {-o-transform:translate(0px, 1000px)}
              to   {-o-transform:translate(0px, 0px)}
            }

            @keyframes aniload {
              from {transform:translate(0px, 1000px)}
              to   {transform:translate(0px, 0px)}
            }

            /* Step 2: Build vertical  Animation */

            /*
            @keyframes changecolor {
            from {color: navajowhite;}
            to {color: #214453;}
            }
            */

            @-webkit-keyframes changecolor {
            from {opacity: 0;}
            to {opacity: 1;}
            }

            @-moz-keyframes changecolor {
            from {opacity: 0;}
            to {opacity: 1;}
            }

            @-ms-keyframes changecolor {
            from {opacity: 0;}
            to {opacity: 1;}
            }

            @-o-keyframes  changecolor {
            from {opacity: 0;}
            to {opacity: 1;}
            }

            @keyframes changecolor {
            from {opacity: 0;}
            to {opacity: 1;}
            }

            /* Step 3: Call the Animations */
            #box1 {
              -webkit-animation:aniload 4s;
              -moz-animation:aniload 4s;
              -ms-animation:aniload 4s;
              -o-animation:aniload 4s;
              animation:aniload 4s;
            }

            #box2 {
              -webkit-animation:aniload 1s;
              -moz-animation:aniload 1s;
              -ms-animation:aniload 1s;
              -o-animation:aniload 1s;
              animation:aniload 1s;
            }

            #box3 { 
              -webkit-animation:aniload 4s;
              -moz-animation:aniload 4s;
              -ms-animation:aniload 4s;
              -o-animation:aniload 4s;
              animation:aniload 4s;
            }

            #box4 {
              -webkit-animation:aniload 3s;
              -moz-animation:aniload 3s;
              -ms-animation:aniload 3s;
              -o-animation:aniload 3s;
              animation:aniload 3s;
            }

            #box5 {
              -webkit-animation:aniload 2s;
              -moz-animation:aniload 2s;
              -ms-animation:aniload 2s;
              -o-animation:aniload 2s;
              animation:aniload 2s;
            }

            #box6 {
              opacity: 0;
              -webkit-animation:changecolor 5s;
              -moz-animation:changecolor 5s;
              -ms-animation:changecolor 5s;
              -o-animation:changecolor 5s;
              animation:changecolor 5s;
              
              -webkit-animation-delay: 4s;
              -moz-animation-delay: 4s;
              -ms-animation-delay: 4s;
              -o-animation-delay: 4s;
              animation-delay: 4s;
              
              -webkit-animation-fill-mode: forwards;
              -moz-animation-fill-mode: forwards;
              -ms-animation-fill-mode: forwards;
              -o-animation-fill-mode: forwards;
              animation-fill-mode: forwards;
            }
            #box7 {
              -webkit-animation:aniload 4s;
              -moz-animation:aniload 4s;
              -ms-animation:aniload 4s;
              -o-animation:aniload 4s;
              animation:aniload 4s;
            }
            #box8 {
              -webkit-animation:aniload 2s;
              -moz-animation:aniload 2s;
              -ms-animation:aniload 2s;
              -o-animation:aniload 2s;
              animation:aniload 2s;
            }
            #box9 {
              -webkit-animation:aniload 1s;
              -moz-animation:aniload 1s;
              -ms-animation:aniload 1s;
              -o-animation:aniload 1s;
              animation:aniload 1s;
            }
            #box10 {
              -webkit-animation:aniload 1s;
              -moz-animation:aniload 1s;
              -ms-animation:aniload 1s;
              -o-animation:aniload 1s;
              animation:aniload 1s;
            }

            #box1 {animation-timing-function: linear;}
            #box2 {animation-timing-function: ease;}
            #box3 {animation-timing-function: ease-in;}
            #box4 {animation-timing-function: ease-out;}
            #box5 {animation-timing-function: ease-in-out;}
            #box7 {animation-timing-function: ease-in;}
            #box8 {animation-timing-function: ease;}
            #box9 {animation-timing-function: ease-in-out;}
            #box10 {animation-timing-function: linear;}
                    
            </style>
</head>
<body>
<div>


   <div class="flex-center position-ref full-height">
        <div class="top-right links">
            @if (Sentinel::check())
                {!! link_to(route('logout'), 'Logout', array('style' => 'color:white;')) !!}
                <a style="color:white;">Welcome {!! Sentinel::getUser()->email !!}</a>
            @else
                {!! link_to(route('signup'), 'Signup', array('style' => 'color:white;')) !!}
                {!! link_to(route('login'), 'Login', array('style' => 'color:white;')) !!}
            @endif
        </div>
                
    <div class="content" id="field">
        <div class="title m-b-md" style="color:white;">
            <div class="box" id="box1">G</div>
            <div class="box" id="box2">e</div>
            <div class="box" id="box3">e</div>
            <div class="box" id="box4">k</div>
            <div class="box" id="box5">s</div>
            <div class="box" id="box7">F</div>
            <div class="box" id="box8">a</div>
            <div class="box" id="box9">r</div>
            <div class="box" id="box10">m</div>
        </div>
        <div class="links box2" id="box6">
            <a  href="/" style="color:white;">Home</a>
            <a   href="/articles" id="article_link" style="color:white;">Article</a>
            <a   href="/articles/create" style="color:white;">New Article</a>    
        </div>
    </div>

</div>


    </body>
</html>
