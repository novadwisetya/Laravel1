

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
        <link rel="stylesheet" href="/css/style.css" >

    </head>
    <body>
    <div class="flex-center position-ref full-height">
    

        <div class="top-right links">
            @if (Sentinel::check())
                <a> {!! link_to(route('logout'), 'Logout') !!}</a>
                <a>Wellcome {!! Sentinel::getUser()->email !!}</a>
            @else
                <a>{!! link_to(route('signup'), 'Signup') !!}</a>
                <a>{!! link_to(route('login'), 'Login') !!}</a>
            @endif
        </div>


    <div class="content">
        <div class="title m-b-md animated bounce">
            GeekFarm
        </div>

        <div class="links">
            <a href="/">Home</a>
            <a href="/articles" id="article_link">Article</a>
            <a href="/articles/create">New Article</a>
            
        </div>
    </div>
</div>
    </body>
</html>
