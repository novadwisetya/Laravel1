@extends("layouts.application")
@section("content")
<div>
    <h1>{!! $article->title !!}</h1>
    <p>{!! $article->content !!}</p>
        <div>
            {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}

            {!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

            {!! link_to(route('articles.edit', $article->id), 'Edit', ['class' => 'btn btn-raised btn-warning']) !!}

            {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
            {!! Form::close() !!}

        </div>

    </div>
    <br>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Give Comments</h3>
    </div>
    <div class="panel-body">
    <!-- {!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'comment-form']) !!} -->
        <div class="form-group">
            
            <div class="col-lg-9">
            {!! Form::hidden('article_id', $value = $article->id, array('class' => 'form-control', 'readonly', 'id' => 'article_id')) !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            {!! Form::label('comment', 'Comment', array('class' => 'col-lg-3 control-label')) !!}
            <div class="col-lg-9">
                {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10, 'autofocus' => 'true', 'id' => 'content')) !!}
                {!! $errors->first('content') !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'User', array('class' => 'col-lg-3 control-label')) !!}
            <div class="col-lg-9">
                {!! Form::text('user', null, array('class' => 'form-control', 'id' => 'user')) !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
            <button type="button" id="comment" class="btn btn-primary" >Post</button>
                <!-- {!! Form::submit('Post', array('class' => 'btn btn-primary', 'id' => 'submit'))!!} -->
            </div>
            <div class="clear"></div>
        </div>
        <!-- {!! Form::close() !!} -->
    

    <div class="row">
        <div class="col-sm-12">
            <h3>Comments : </h3>
        </div><!-- /col-sm-12 -->
    </div><!-- /row -->
    @foreach($comments as $comment)
        <div class="col-sm-1">
            <div class="thumbnail">
                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </div><!-- /thumbnail -->
        </div><!-- /col-sm-1 -->
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <strong>{!! $comment->user !!}</strong> <span style="float:right;">{!! $comment->created_at !!}</span>
                </div>
                <div class="panel-body">
                    <p>{!! $comment->content !!}</p> 
                    <span><a href="#">Reply</a></span><span> . </span><span><a href="#">Report</a></span>
                </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
        </div><!-- /col-sm- -->
    @endforeach
    @stop

</div>
</div>

    