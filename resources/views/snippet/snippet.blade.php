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
								@if(Auth::check())
									@if ($snippet->id_user == Auth::user()->id)
										<a class="btn btn-danger" href="{{ URL::route('editsnippet', array( $snippet->id )) }}"> <i class="fa fa-pencil"></i> Edit this snippet </a>
									@endif	
								@endif
					        	<a href="javascript:toggleLike();" id="likeButton" class="btn btn-danger">
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

			    <script type="text/javascript">
			    	function toggleLike(){
			    		$.post('/ajaxController/like-snippet', { _token: '{{ csrf_token() }}', id: '{{ $snippet->id }}' }).done(function(data){
			    			if (data == 'true'){
			    				$("#likeButton").html('<i class="fa fa-thumbs-down"></i> Unlike this snippet');
			    			} else {
			    				$("#likeButton").html('<i class="fa fa-thumbs-up"></i> Like this snippet');
			    			}
			    		});
			    	}

			    	function editComment(id){
			    		var comment = $("#comment_" + id);
			    		var oldComment = $(comment).html();
			    		$(comment).html('<span class="oldComment hidden">' + oldComment + '</span><textarea class="form-control" id="editComment_' + id + '">' + oldComment + '</textarea>');
			    		$(comment).parent().find('.commentButtons').hide();
			    		$(comment).parent().find('.saveComment').show();
			    	}

			    	function saveComment(id){
			    		var comment = $("#comment_" + id);
			    		var newComment = $("#editComment_" + id).val();
			    		$.post("/snippet/comment/edit", { _token: '{{ csrf_token() }}', id: id, comment: newComment }).done(function(data){
			    			if (data == 'true'){
			    				console.log('yes');
			    				$(comment).html(newComment);
			    			} else {
			    				console.log('no');
			    				$(comment).html( $(comment).find('.oldComment').html() );
			    			}
			    			$(comment).parent().find('.commentButtons').show();
			    			$(comment).parent().find('.saveComment').hide();
			    		});
			    		
			    	}

			    	function deleteComment(id){
			    		$.post("/snippet/comment/delete", { _token: '{{ csrf_token() }}', id: id }).done(function(data){
			    			if (data == 'true'){
			    				$("#masterComment_" + id).fadeOut('slow', function(){
			    					$(this).remove();
			    				})
			    			}
			    		});
			    	}
			    </script>	

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
		<div class="row" id="masterComment_{{ $comment->id }}">
			<div class="container">
				
				<div class="col-md-12">
					<blockquote>
						<p id="comment_{{ $comment->id }}">{{ $comment->comment }}</p>
						<a onclick="saveComment({{ $comment->id }});" class="btn btn-danger saveComment pull-right" style="display:none;">Save comment</a>
						<span class="pull-right commentButtons" style="margin-top:-20px;"> 
							@if(Auth::check() && $comment->id_user == Auth::user()->id) 
								<a class="btn btn-danger" href="javascript:editComment({{ $comment->id }});"><i class="fa fa-pencil fa-lg"></i></a> 
								<a class="btn btn-danger" href="javascript:deleteComment({{ $comment->id }});"><i class="fa fa-trash fa-lg"></i></a> 
							@endif 
						</span>
						<small>Comment by: <cite title="Author">{{ $comment->author->name }} ({{ $comment->author->email }})</cite> @ <cite title="Date"> {{ date('d-m-Y H:i', strtotime($comment->created_at)) }} </cite></small>
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