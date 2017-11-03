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
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> 

    <style>
    html{
        background-color:white;
    }
    body{
        background-color:white;
    }
    .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
    }
    .navbar {
        /* padding-top: 10px;
        padding-bottom: 10px; */
        background-color:#f4511e;
        border: 0;
        border-radius: 0;
        margin-bottom: 0;
        font-size: 12px;
        letter-spacing: 3px;
    }
    .nav{
        color:white;
    }
    /* .navbar-nav  li a:hover {
        color: #f4f442 !important;
    } */
    .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  </style>

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
            <div class="session-flash alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        @if (Session::has('notice'))
        <div class="session-flash alert alert-info">
            {{Session::get('notice')}}
        </div>
        @endif
       <div class="session-flash alert-warning">
        {{ $errors->first('import_file') }}
        </div>
        <div class="row">
            <div class="clear"></div>
            <!-- <p>Sort articles by : <a id="id">ID &nbsp;<i id="ic-direction"></i></a></p> -->
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
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<!-- Handling Datatable -->
<script type="text/javascript">
 
    $(document).ready(function() {
        oTable = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.getposts') }}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'content', name: 'content'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'}
            ]
        });
    });
</script>


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


<!-- for handling datatables -->

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {{ route('datatable.getposts') }},
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'tag', name: 'tag'}
        ]
    });
});
</script>

<!-- handle submit -->
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#delete').on('click', function(){
        alert('berhasil');
        $.ajax({
            url : 'articles',
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
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import Artcile</h4>
            </div>
        {!! Form::open(['url' => 'importExcel', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
                <p>Choose file to import</p>
                <input type="file" name="import_file"/>	                       
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning">Import File</button>
            </div>
        </form>

        </div>
    </div> 
</div>  
    </body>
</html>