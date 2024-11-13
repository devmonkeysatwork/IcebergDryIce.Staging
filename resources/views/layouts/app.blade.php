<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'IcebergDryIce') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/backpack/backpack.base.css') }}" rel="stylesheet">
</head>

<body>
  @include('vendor.backpack.base.inc.header')
  <div id="app">
    @include('vendor.backpack.base.inc.sidebar')

    <div class="main-content">
      @yield('content')
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('vendor/backpack/backpack.base.js') }}"></script>
</body>

</html>
