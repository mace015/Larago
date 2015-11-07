@extends('layout.main')


@section('head')

	<link rel="stylesheet" href="{{ asset('js/highlight/styles/railscasts.css') }}">

@stop


@section('scripts')

	<script src="{{ asset('js/highlight/highlight.pack.js') }}"></script>
	<script type="text/javascript"> hljs.initHighlightingOnLoad(); </script>
	
@stop


@section('content')

	<div class="row">
		<div class="container">
			
			<div class="col-md-12">

			    <div class="page-header">
					<h1 id="forms"> {{ $snippet->name }}
						@if(Auth::check())
							<div class="pull-right">
					        	<a href="{{ URL::route('like', array($snippet->id)) }}" class="btn btn-danger">
					        		@if ($snippet->isLiked())
					        			<i class="fa fa-thumbs-down"></i> Unlike this snippet
					        		@else
					        			<i class="fa fa-thumbs-up"></i> Like this snippet
					        		@endif
					        	</a>
							</div>
						@endif
					</h1>
			    </div>

			    <p> <strong> {{ $snippet->short_desc }} </strong> </p>
			    <p> {{ $snippet->long_desc }} </p>

		    </div>

		</div>
	</div>

	<div class="row">
		<div class="container">
			
			<div class="col-md-12">
	            <h2 id="nav-tabs">Code</h2>
	            <div class="bs-component">
					<pre><code>
{{ $snippet->code }}
					</code></pre>
				</div>
          	</div>

		</div>
	</div>

	<div class="row">
		<div class="container">
			
			<div class="col-md-12">
				<div class="page-header">
					<h2> Comments </h2>
			    </div>
			</div>

		</div>
	</div>

	@foreach($snippet->comments as $comment)
		<div class="row">
			<div class="container">
				
				<div class="col-md-12">
					<blockquote>
						<p>{{ $comment->comment }}</p>
						<small>Comment by: <cite title="Source Title">{{ $comment->author->name }}</cite></small>
					</blockquote>
				</div>

			</div>
		</div>
	@endforeach

	<div class="row">
		<div class="container">
		  	<div class="col-md-12">

			@if($errors->any())
				<div class="bs-component">
				<div class="alert alert-dismissable alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Whoops....! Something went wrong!</strong> 
						@foreach($errors->all() as $error)
							<p> {{ $error }} </p>
						@endforeach
				</div>
				<div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
			@endif

		    <div class="well bs-component">
			    <fieldset>

	          		<legend class="center">Comment on this snippet: </legend>
	          
	          		{!! Form::open(array('route' => array('comment', $snippet->id))) !!}
						<div class="form-group">
							<label for="Comment" class="col-md-2 control-label">Comment</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" name="comment"></textarea>
								<span class="help-block">Please do not use any foul language or place useless comments, these will be removed.</span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-2">
								<button type="submit" class="btn btn-danger">Send comment</button>
							</div>
						</div>
					{!! Form::close() !!}
	          
	        	</fieldset>
		  	</div>

		</div>
	</div>

@stop