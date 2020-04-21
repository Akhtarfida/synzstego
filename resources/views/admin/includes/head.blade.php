<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

	  <!-- Scripts -->
	  <script src="{{ asset('js/app.js') }}" defer></script>
	  <script src="{{ asset('font-awesome/all.js') }}" ></script>


	  <link rel="title icon" href="{{ asset('images/title-img.png') }}">
      
	  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	   -->
	  <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

	  <!-- Styles -->


	  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> -->
	  <link rel="stylesheet" href="{{asset('css/styles.css')}}">

	  <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


	@yield('style')
  
    <title>Admin Dashboard</title>
  
  </head>