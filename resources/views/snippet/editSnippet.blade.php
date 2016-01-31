@extends('layout.main')


@section('head')
	<style>
		#editor{
			height: 500px;
		}
	</style>
@stop


@section('scripts')
	<script src="{{ asset('js/ace/ace.js') }}" type="text/javascript"></script>
	<script>
		$( document ).ready(function() {
		    var editor = ace.edit("editor");
		    editor.setTheme("ace/theme/twilight");
		    editor.getSession().setMode("ace/mode/php");

		    var input = $('.codePost');
	        editor.getSession().on("change", function () {
		        input.html(editor.getSession().getValue());
		    });
	    });
	</script>
@stop


@section('content')

	<div class="row">
		<div class="container">
		  	<div class="col-md-12">
		    <div class="page-header">
		      <h1 id="forms">Add Snippet</h1>
		    </div>

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
			{!! Form::open() !!}
			    <div class="well bs-component">
			      	<form class="form-horizontal">
				        <fieldset>
				          	
				          	<div class="form-group">
					            <label for="inputEmail" class="col-md-2 control-label">Snippet name</label>
					            <div class="col-md-10">
					              <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $snippet->name }}"> <br />
					            </div>
				          	</div>

				          	<div class="form-group">
								<label for="Comment" class="col-md-2 control-label">Short description</label>
								<div class="col-md-10">
									<textarea class="form-control" rows="3" name="short_desc">{{ $snippet->short_desc }}</textarea> <br />
									<span class="help-block">Write a short description of your snippet here!</span>
								</div>
							</div>

							<div class="form-group">
								<label for="Comment" class="col-md-2 control-label">Long description</label>
								<div class="col-md-10">
									<textarea class="form-control" rows="3" name="long_desc">{{ $snippet->long_desc }}</textarea> <br />
									<span class="help-block">Write a long description of your snippet here!</span>
								</div>
							</div>

							<div class="form-group">
								<label for="Comment" class="col-md-2 control-label">Snippet code</label>
								<div class="col-md-10">
									<div id="editor">{{ $snippet->code }}</div> <br />
									<span class="help-block">Put the code for your snippet here!</span>
									<textarea class="form-control hidden codePost" name="code">{{ $snippet->code }}</textarea>
								</div>
							</div>

							<div class="form-group">
				            <div class="col-md-10 col-md-offset-2">
				              <button type="submit" class="btn btn-danger">Save</button>
				            </div>
				          </div>

				        </fieldset>
			      	</form>
			    	<div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
			  	</div>
			  	{!! Form::close() !!}
		</div>
	</div>

@stop