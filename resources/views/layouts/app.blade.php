<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="author" content="Jeck Anderson">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
      {{-- Fontawesome --}}
      <link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
      {{-- Style --}}
      <link rel="stylesheet" href="assets/css/style.css">
  
      <title>{{ $title }}</title>
    </head>
    <body style="background: url(assets/img/hell.jpg);">

      @include('partials.navbar')

      <main class="container">
          @yield('container')
      </main>

      @include('home.footer')
