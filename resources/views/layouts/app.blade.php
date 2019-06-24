<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Mentorship Dashboard</title>

	<link rel="preconnect" href="http://fonts.gstatic.com/" crossorigin>

	<!-- PICK ONE OF THE STYLES BELOW -->
	<!-- <link href="{{ asset('dashboard/css/classic.css') }}" rel="stylesheet"> -->
	<!-- <link href="{{ asset('dashboard/css/corporate.css') }}" rel="stylesheet"> -->
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link href="{{ asset('dashboard/css/modern.css') }}" rel="stylesheet">
	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
	body {
		opacity: 0;
	}
	</style>
	
	<!-- END SETTINGS -->
</head>

<body class = "sidebar-light">
	<div id = "app">
		<app></app>
	</div>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('dashboard/js/app.js') }}"></script>
</body>
</html>