<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portal') }}</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    
    @yield('head')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-life-saver"></i> <span>{{ config('app.name', 'Portal') }}</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            @if(Auth::check())
              @include('partials.profile_quick_info')
            @endif
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            
            @include('partials.nav_sidebar')
            
<!-- /menu footer buttons -->

            <!-- /sidebar menu -->
          </div>
       </div>

        <!-- top navigation -->
       
       @include('partials.nav_top')

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          
            @yield('content')  
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
            
        @include('partials.footer')
        <!-- /footer content -->
      </div>
    </div>

    <script src="{{ asset('js/all.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.0/vue.js"></script>

    @yield('foot')
    
  </body>
</html>