@extends('layout.main')


@section('content')

	<div class="row">
		<div class="container">
			
			<div class="col-md-12">

			    <div class="page-header">
					<h1 id="forms">Snippets
						<div class="pull-right">
				            <div class="col-md-8">
				              	<input type="text" onkeyup="getSnippets()" class="form-control" id="search" placeholder="Search">
				            </div>
				            <input type="submit" onclick="getSnippets()" class="btn btn-danger" value="Search" />
						</div>
					</h1>
			    </div>

			    <p>Welcome to the snippet page! Here you can view the latest snippers, or search for some keywords!</p>

		    </div>

		</div>
	</div>

	<div id="snippetsContent">

	</div>

	<script type="text/javascript">

		function getSnippets(){

			var search = $("#search").val();

			$.post('/ajaxController/get-snippets', { _token: '{{ csrf_token() }}', search: search }).done(function(data){
				$("#snippetsContent").html(data);
			});

		}

		$(document).ready(function(){
			getSnippets();
		});

	</script>

@stop