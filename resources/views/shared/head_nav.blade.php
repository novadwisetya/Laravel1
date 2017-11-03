
<div class="navbar navbar-fixed-top navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"/>
            <span class="icon-bar"/>
            <span class="icon-bar"/>
            </button>
            <a href="/" class ="navbar-brand" style="color:white;">GeekFarm</a>

            <div class="form-group navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" id="keywords" placeholder="Search">
                    <span class="input-group-btn">
                        <button id="search" class="btn btn-warning" type="button">Search!</button>
                    </span>
                </div>
            </div>
            <!-- <div class="form-group navbar-form navbar-left">
            <button id="search" type="button" class="btn btn-default">Search</button>
            </div> -->
            
        </div>
        <div class="collapse navbar-collapse">    
            
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/" style="color:white;">Home</a></li>
                <li><a href="/articles" style="color:white;">Article</a></li>                
                @if (Sentinel::check())
                <li style="color:white;">{!! link_to(route('logout'), 'Logout', array('style' => 'color:white;')) !!}</li>
                <li><a style="color:white;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {!! Sentinel::getUser()->email !!}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{!! link_to('articles/create', 'New Article') !!}</li>
                        <li><a data-toggle="modal" data-target=".bs-example-modal-sm">Import</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Setting</a></li>
                        <li>{!! link_to(route('logout'), 'Logout', array('style' => 'color:black;')) !!}</li>
                    </ul>
                
                </li>
                @else
                <li>{!! link_to(route('signup'), 'Signup') !!}</li>
                <li>{!! link_to(route('login'), 'Login') !!}</li>
                @endif
            </ul>
           
        </div>
    </div>
</div>