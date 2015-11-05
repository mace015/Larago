
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Larago</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.growl.css') }}" rel="stylesheet">

    <link href="{{ asset('favicon.jpg') }}" rel="shortcut icon">

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.growl.js') }}"></script>

    @yield('head')

  </head>

  <body>

    @if ( Session::has('message') )

        <script type="text/javascript">
          $( document ).ready(function() {
              $.growl.{{ Session::get('type') }}({ title: "Larago.com says:", message: '{{ Session::get('message') }}'});
          });
        </script>

    @endif

    @include('layout.partials.navbar')

    @yield('content')

    <footer class="footer">
      <div class="container">
        <p class="text-danger"> Larago | <a href="http://macemuilman.nl" class="btn btn-danger btn-sm"> Mace Muilman </a> | <a href="http://moodles.nl" class="btn btn-danger btn-sm"> Moodles </a> </p>
      </div>
    </footer>

    @yield('scripts')
    
  </body>
</html>
