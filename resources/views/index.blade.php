@extends('layout.main')

@section('content')

  <div class="jumbotron" style="background-image: url({{ asset('images/header.jpg') }});color:white;">
    <div class="container">
      <h1>Hello, welcome to Larago!</h1>
      <p>Larago's single purpose is to share high quality laravel code with other developers! Sign up, and see all the snippets that are available, and add your own!</p>
      @if (!Auth::check()) <p><a class="btn btn-danger" href="{{ URL::route('register') }}" role="button">Sign up &raquo;</a></p> @endif
    </div>
  </div>

  <div class="container">

    <h2 class="center"> "Larago is very usefull for both beginner and advanced developers!" </h2>

    <hr />

    <div class="row">
      <div class="col-md-4">
        <h2> <i class="fa fa-diamond"></i> High Quality</h2>
        <p>Larago aims to share only high quality code snippets with other developers!</p>
      </div>
      <div class="col-md-4">
        <h2> <i class="fa fa-list"></i> Wide Variety</h2>
        <p>There is a wide variaty of snippets available! Anything from user authentication to file uploading/handeling. </p>
      </div>
      <div class="col-md-4">
        <h2> <i class="fa fa-comment-o"></i> Comment & Rate</h2>
        <p>Did you like a snippet? Have any improvements? You can comment and rate every snippet!</p>
      </div>
    </div>

    <hr />

    <div class="row">
      <div class="col-md-4">
        <h2> <i class="fa fa-rocket"></i> Speed</h2>
        <p>Speed up your development process by using excelent code ready to be used in your laravel application!</p>
      </div>
      <div class="col-md-4">
        <h2> <i class="fa fa-keyboard-o"></i> View Code Directly</h2>
        <p>Downloading files to use a snippet? No. View the code in our beautiful code viewer, and copy it directly to your clipboard!</p>
      </div>
      <div class="col-md-4">
        <h2> <i class="fa fa-send-o"></i> Share</h2>
        <p>Written some code you're very proud of? Share it with the world, for everyone to see, improve and use.</p>
      </div>
    </div>

    <hr />

  </div>

@stop