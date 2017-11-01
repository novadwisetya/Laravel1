
<!-- <div> -->
		<!-- {!! link_to('articles/create', 'New Article', array('class' => 'btn btn-raised btn-success')) !!} -->
		
		<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm">Import Article</button>
		<p class="text-danger">{!! $errors->first('import_file') !!}	</p>

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
		</div> -->
<!-- </div> -->




        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 >Articles list</h2>
				<hr style="display: block;height: 1px;border: 0;border-top: 1px solid #f4511e;margin: 1em 0;padding: 0; ">
				<p>Sort articles by : <a id="id">ID &nbsp;<i id="ic-direction"></i></a></p>
            </div>
			
        </div>
        <!-- /.row -->

@foreach ($articles as $article)

		<div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="/img/article.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h4 class="text-primary">{!! $article->title !!}</h4>
                <p class="text-justify">&emsp;&emsp;{!! str_limit($article->content, 250) !!}</p>
				
                <!-- <a class="btn btn-danger" style="color: #fff;background-color: #f4511e;border-color: #f4511e;" href="#">Read More... <span class="glyphicon glyphicon-chevron-right"></span></a> -->
				<div class="text-right">
				{!! link_to('articles/'.$article->id, 'Read more...', array('class' => 'btn btn-danger', 'style' => 'color: #fff;background-color: #f4511e;border-color: #f4511e;')) !!}
       
				</div>
			</div>
			</div>
			
        <!-- /.row -->

        <hr style="display: block;height: 1px;border: 0;border-top: 1px solid #f4511e;margin: 1em 0;padding: 0; ">
	<!-- <div>
			<h1>{!! $article->title !!}</h1>
			<p>
			{!! $article->content !!}</p>
	</div>
	<div>
		@if(Sentinel::inRole('Writer'))
				{!! link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info')) !!}
				@else
				{!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}
				{!! link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info')) !!}
				{!! link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning')) !!}
				
				{!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
				{!! Form::close() !!}
		@endif
	</div> -->
@endforeach
