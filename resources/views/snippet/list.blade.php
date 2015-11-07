@extends('layout.main')


@section('content')

	<div class="row">
		<div class="container">
			
			<div class="col-md-12">

			    <div class="page-header">
					<h1 id="forms">Snippets
						<div class="pull-right">
							{!! Form::open() !!}
					            <div class="col-md-8">
					              	<input type="text" class="form-control" name="Search" placeholder="Search">
					            </div>
					            <input type="submit" name="search" class="btn btn-danger" value="Search" />
					        {!! Form::close() !!}
						</div>
					</h1>
			    </div>

			    <p>Welcome to the snippet page! Here you can view the latest snippers, or search for some keywords!</p>

		    </div>

		</div>
	</div>

	@if (count($snippets->getCollection()->all()) == 0)
		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<h1>Sorry, no snippets available!</h1>
				</div>
			</div>
		</div>
	@endif

	@foreach(array_chunk($snippets->getCollection()->all(), 3) as $row)
		<div class="row">
			<div class="container">
				
				@foreach($row as $snippet)
					<div class="col-md-4">
						<div class="panel panel-danger">
			                <div class="panel-heading">
			                  <h3 class="panel-title">{{ $snippet->name }} <span class="pull-right"><i class="fa fa-thumbs-up"></i> {{ $snippet->likes->count() }} </span> </h3>
			                </div>
			                <div class="panel-body">
								{{ $snippet->short_desc }}
								<hr />
								By: {{ $snippet->author->name }}
								<hr />
								<a href="{{ URL::route('snippet', array( $snippet->id )) }}"> View this snippet </a>
			                </div>
		              	</div>
				    </div>
				@endforeach

			</div>
		</div>
	@endforeach

	<div class="row">
		<div class="container">
			{!! $snippets->render() !!}
		</div>
	</div>

@stop