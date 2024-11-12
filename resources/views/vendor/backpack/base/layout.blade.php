<!-- resources/views/vendor/backpack/base/layout.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'IcebergDryIce') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/backpack/backpack.base.css') }}" rel="stylesheet">
</head>

<body>
  <?php echo "Layout is being rendered"; ?>
  @include('backpack::inc.head')
  <div class="app">
    @include('vendor.backpack.base.inc.header')
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