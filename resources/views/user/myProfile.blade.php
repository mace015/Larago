@extends('layout.main')


@section('content')

	<div class="row">
		<div class="container">
		  	<div class="col-md-12">
		    <div class="page-header">
		      <h1 id="forms">Edit my information.</h1>
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
				            <label for="inputEmail" class="col-md-2 control-label">Name</label>
				            <div class="col-md-10">
				              <input type="text" class="form-control" name="Name" placeholder="Name" value="{{ Auth::user()->name }}"> <br />
				            </div>
				          </div>

				          <div class="form-group">
				            <label for="inputEmail" class="col-md-2 control-label">Country</label>
				            <div class="col-md-10">
				              <input type="text" class="form-control" name="Country" placeholder="Country" value="{{ Auth::user()->country }}"> <br />
				            </div>
				          </div>

				          <p class="text-danger">Leave password fields empty if you dont want to change your password!.</p>

				          <div class="form-group">
				            <label for="inputPassword" class="col-md-2 control-label">Password</label>
				            <div class="col-md-10">
				              <input type="password" class="form-control" name="Password" placeholder="Password"> <br />
				            </div>
				          </div>

				          <div class="form-group">
				            <label for="inputPassword" class="col-md-2 control-label">Repeat Password</label>
				            <div class="col-md-10">
				              <input type="password" class="form-control" name="RepeatPassword" placeholder="Repeat Password"> <br />
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