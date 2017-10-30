
<div>
		{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-raised btn-success')) !!}
</div>

@foreach ($articles as $article)
	<div>
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
	</div>
@endforeach