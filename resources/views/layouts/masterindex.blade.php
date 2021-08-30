<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <title>@yield('title',config('app.name'))</title>
  @include('layouts.partials.head')
  @yield('head')
</head>
<body id="home-body">
<div class="container-fluid">
  <div class="container">
  @include('layouts.partials.navbarindex')
  @yield('content')
  @include('layouts.partials.footerindex')
  </div>
</body>
</html>
