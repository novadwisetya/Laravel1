@extends("layouts.application")
@section("content")
<!-- Page Content -->
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{!! $article->title !!}</h1>
                <hr>
                <!-- Date/Time -->
                <!-- <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p> -->

                <!-- Preview Image -->
                <img class="img-responsive" src="/img/article2.jpg" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead text-justify">&emsp;&emsp;{!! $article->content !!}</p>

                <hr>
                <div class="text-center">
                    {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}

                    {!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

                    {!! link_to(route('articles.edit', $article->id), 'Edit', ['class' => 'btn btn-raised btn-warning']) !!}
                    {!! link_to('exportExcel/xlsx/' . $article->id, 'Export', ['class' => 'btn btn-raised btn-warning']) !!}
                    <!-- {{ URL::to('exportExcel/xlsx') }} -->

                    {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
                    {!! Form::close() !!}

                </div>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <!-- <form role="form"> -->
                        <div class="form-group">
                        {!! Form::hidden('article_id', $value = $article->id, array('class' => 'form-control', 'readonly', 'id' => 'article_id')) !!}
                        {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10, 'autofocus' => 'true', 'id' => 'content')) !!}
                        {!! $errors->first('content') !!}
                        </div>
                        <div class="form-group">
                            
                            {!! Form::hidden('user', $value = Sentinel::getUser()->email, array('class' => 'form-control', 'readonly', 'id' => 'user')) !!}
                            <!-- {!! Form::text('user', null, array('class' => 'form-control', 'id' => 'user')) !!} -->
                            <div class="clear"></div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="comment" class="btn btn-warning" >Post</button>
                        </div>
                        
                    <!-- </form> -->
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{!! $comment->user !!}
                            <small>{!! $comment->created_at !!}</small>
                        </h4>
                        {!! $comment->content !!}
                        <br>
                        <span><a href="#">Reply</a></span><span> . </span><span><a href="#">Report</a></span>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
            
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Article Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Business</a>
                                </li>
                                <li><a href="#">Economy</a>
                                </li>
                                <li><a href="#">Goverment</a>
                                </li>
                                <li><a href="#">Politics</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Fashion</a>
                                </li>
                                <li><a href="#">Health</a>
                                </li>
                                <li><a href="#">Bursa Effect</a>
                                </li>
                                <li><a href="#">World</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; MyArticle 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
    @endsection