<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}"> <img src="{{ asset('images/logo.png') }}" /> </a>
      <a class="navbar-brand" href="{{ URL::route('home') }}"> Larago </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav">
        <li @if( Request::is('/') ) class="active" @endif ><a href="{{ URL::route('home') }}"> Home </a></li>
        <li @if( Request::is('snippet*') ) class="active" @endif ><a href="{{ URL::route('snippets') }}"> Snippets </a></li>
      </ul>

      @if(Auth::check())
      <ul class="nav navbar-nav navbar-right">
        <li @if( Request::is('addsnippet') ) class="active" @endif ><a href="{{ URL::route('addsnippet') }}"> Add a snippet </a></li>
        <li @if( Request::is('mysnippets') ) class="active" @endif ><a href="{{ URL::route('mysnippets') }}"> My snippets </a></li>
        <li @if( Request::is('me') ) class="active" @endif ><a href="{{ URL::route('me') }}"> My profile </a></li>
        <li><a href="{{ URL::route('logout') }}"> Logout </a></li>
      </ul>
      @else
      <ul class="nav navbar-nav navbar-right">
        <li @if( Request::is('login') ) class="active" @endif ><a href="{{ URL::route('login') }}"> Login </a></li>
        <li @if( Request::is('register') ) class="active" @endif ><a href="{{ URL::route('register') }}"> Sign up </a></li>
      </ul>
      @endif

    </div>
  </div>
</nav>