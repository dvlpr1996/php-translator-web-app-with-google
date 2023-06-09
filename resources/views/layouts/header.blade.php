<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="language" content="en">
		<meta name="robots" content="index, follow">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="owner" content="Nima jahan bakhshian | dvlpr1996">
		<meta name="author" content="Nima jahan bakhshian | dvlpr1996">
		<meta name="designer" content="Nima jahan bakhshian | dvlpr1996">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="description" content="php-translator-web-app-with-google | dvlpr1996">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="php-translator-web-app-with-google, tailwindCss, dvlpr1996, php8">
		<script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
		<!-- [if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<![endif] -->
</head>

<body x-data="{ 'darkMode': true }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)));">
