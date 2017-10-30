<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta httpequiv="XUACompatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-
    scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GeekFarm</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" >

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
        <div class="row">
            <div class="form-group label-floating">
                <div class="clear"></div>

            </div>
        
            <br />
            <div class="form-group label-floating">
                <label class="col-lg-2" for="keywords">Search Article</label>
                <div class="col-lg-8">
                <input type="text" class="form-control" id="keywords" placeholder="Type search keywords">
            </div>

            <div class="col-lg-2">
            <button id="search" class="btn btn-info btn-flat" type="button"> Search </button>
        </div>

        <div class="clear"></div>
            <p>Sort articles by : <a id="id">ID &nbsp;<i id="ic-direction"></i></a></p>
            <br />
            <div id="data-content">
                @yield("content")
            </div>
            <input id="direction" type="hidden" value="asc" />
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    


<!-- This for handle comment -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#comment').on('click', function(){
        $.ajax({
            url : '/postcomment',
            type : "POST",
            dataType : 'json',
            data : {
                'article_id' : $("#article_id").val(),
                'content' : $("#content").val(),
                'user' : $("#user").val()
            },

            success : function(data) {
            },

            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            },
            
            complete : function() {
            alreadyloading = false;
            }
        });
    });
</script>

<!-- This for handle ajax search -->
<script>
    $('#search').on('click', function(){
        $.ajax({
            
            url : '/articles',
            type : 'GET',
            dataType : 'json',
            data : {
                'keywords' : $('#keywords').val(),
                'direction' : $('#direction').val()
            },

            success : function(data) {
            $('#data-content').html(data['view']);
            $('#keywords').val(data['keywords']);
            $('#direction').val(data['direction']);
            },

            error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
            },
            
            complete : function() {
            alreadyloading = false;
            }
        });
    });
</script>


<!-- this js for handle ajax sorting -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#id', function(e) {
        sort_articles();
        e.preventDefault();
        });
    });

    function sort_articles() {
        $('#id').on('click', function() {
            $.ajax({
                url : '/articles',
                type : 'GET',
                dataType : 'json',
                data : {
                'keywords' : $('#keywords').val(),
                'direction' : $('#direction').val()
                },

                success : function(data) {
                    $('#data-content').html(data['view']);
                    $('#keywords').val(data['keywords']);
                    $('#direction').val(data['direction']);

                    if(data['direction'] == 'asc') {
                    $('i#ic-direction').attr({class: "fa fa-arrow-up"});
                    } else {
                    $('i#ic-direction').attr({class: "fa fa-arrow-down"});
                    }
                },

                error : function(xhr, status, error) {
                    console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
                },

                complete : function() {
                    alreadyloading = false;
                }
            });
        });
    }
</script>
    </body>
</html>