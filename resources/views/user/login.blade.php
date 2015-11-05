@extends('layout.main')


@section('content')

	<div class="row">
		<div class="container">
		  	<div class="col-md-12">
		    <div class="page-header">
		      <h1 id="forms">Login</h1>
		    </div>
			@if(isset($success) && count($success) > 0)
				<div class="bs-component">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Yes! You did it!</strong>
						@foreach($success as $message)
							<p> {{ $message }} </p>
						@endforeach
				</div>
				<div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
			@endif

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
				          <legend class="center">Need a Larago account? <a href="{{ URL::route('register') }}">Sign up here!</a></legend>
				          
				          <div class="form-group">
				            <label for="inputEmail" class="col-md-2 control-label">Email</label>
				            <div class="col-md-10">
				              <input type="text" class="form-control" name="Email" placeholder="Email" value="{{ Input::old('Email') }}"> <br />
				            </div>
				          </div>

				          <div class="form-group">
				            <label for="inputPassword" class="col-md-2 control-label">Password</label>
				            <div class="col-md-10">
				              <input type="password" class="form-control" name="Password" placeholder="Password"> <br />
				            </div>
				          </div>

						  <div class="form-group">
							  <div class="col-md-12">
							    <label class="checkbox-inline">
							      <input type="checkbox" value="yes" name="remember_me">
							      <span class="custom-checkbox"></span> Remember me
							    </label>
							  </div>
						  </div>

				          <div class="form-group">
				            <div class="col-md-10 col-md-offset-2">
				              <button type="submit" class="btn btn-danger">Login</button>
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