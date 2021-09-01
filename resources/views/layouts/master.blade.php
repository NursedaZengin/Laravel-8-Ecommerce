<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <title>@yield('title',config('app.name'))</title>
  @include('layouts.partials.head')
  @yield('head') <!--extra kod eklemek için alan-->
</head>
<body>
  <container>
    <div class="container-fluid">
  @include('layouts.partials.navbar')
  @yield('content')
  @include('layouts.partials.footer')
  </container>
</body>
@yield('js')
</html>
