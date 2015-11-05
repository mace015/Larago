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
						<div class="pull-right">
				        	<a href="" class="btn btn-danger"> <i class="fa fa-thumbs-up"></i> Like this snippet </a>
						</div>
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

	<div class="row">
		<div class="container">
			
			<div class="col-md-6">
				<blockquote>
					<p>I realy like this snippet, great job, keep it up!!</p>
					<small>Comment by: <cite title="Source Title">Mace Muilman</cite></small>
				</blockquote>
			</div>

			<div class="col-md-6">
				<blockquote class="pull-right">
					<p>Great Snippet!</p>
					<small>Comment by: <cite title="Source Title">Jannick Berkhout</cite></small>
				</blockquote>
			</div>	

		</div>
	</div>

	<div class="row">
		<div class="container">
			
			<div class="col-md-6">
				<blockquote>
					<p>This is one of my favorite snippets! GJ!</p>
					<small>Comment by: <cite title="Source Title">Martijn de Ridder</cite></small>
				</blockquote>
			</div>

			<div class="col-md-6">
				<blockquote class="pull-right">
					<p>I have used this snippet in my project!</p>
					<small>Comment by: <cite title="Source Title">Stefan Koolen</cite></small>
				</blockquote>
			</div>	

		</div>
	</div>

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
		      	<form class="form-horizontal">
			        <fieldset>
			          	<legend class="center">Comment on this snippet: </legend>
			          
							{!! Form::open() !!}
								<div class="form-group">
									<label for="Comment" class="col-md-2 control-label">Comment</label>
									<div class="col-md-10">
										<textarea class="form-control" rows="3" name="Comment"></textarea>
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
		      	</form>
		  	</div>

		</div>
	</div>

@stop