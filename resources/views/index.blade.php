<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
		<title>{{ config('app.app_name') }}</title>
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

		<!-- container -->
		<div class="mx-auto max-w-6xl" x-bind:class="{ 'dark': darkMode === true }">

				<!-- nav bar -->
				<nav class="my-2 flex items-center justify-between md:my-5">
						<a href="{{ route('home') }}" class="text-4xl">
								<i class="fas fa-language theme-toggle"></i>
						</a>

						<div>
								<i class="fas theme-toggle cursor-pointer text-2xl" x-on:click="darkMode = !darkMode"
										x-bind:class="darkMode ? 'fa-sun' : 'fa-moon'">
								</i>
						</div>
				</nav>

				<h1 class="mt-5 text-center text-2xl md:mt-10 md:text-5xl">
						Php Translator Web App With Google
				</h1>

				<!-- main content -->
				<main class="mt-5 flex flex-col items-center justify-between gap-0 md:mt-20 md:flex-row md:gap-5">

						<!-- translate form -->
						<div class="w-full md:w-6/12">
								<form action="{{ route('translate') }}" method="post" id="translate">
										<div class="mb-3">
												<select name="translateFROM" x-data="languageList()">
														<option value="ndLang">DETECT LANGUAGE</option>
														<template x-for="lang in language">
																<option :value="lang.value" x-text="lang.lang"></option>
														</template>
												</select>
										</div>

										<div class="relative my-3">
												<!-- main textarea -->
												<textarea name="mainText" id="mainTextarea" autofocus></textarea>
												<span class="absolute bottom-5 right-3 select-none text-slate-700 dark:text-white"
														title="Limit the number of letters" id="lettersLimiter">
												</span>
										</div>
								</form>
						</div>

						<div class="w-full md:w-6/12">
								<div class="mb-3">
										<select name="translateTo" x-data="languageList()" form="translate">
												<option value="ndLang">DETECT LANGUAGE</option>
												<template x-for="lang in language">
														<option :value="lang.value" x-text="lang.lang"></option>
												</template>
										</select>
								</div>

								<div class="relative my-3">
										<textarea id="textToCopy" name="translatedText"></textarea>

										<a href="#" class="btn absolute bottom-5 right-2" id="copyBtn" data-clipboard-target="#textToCopy">
												copy
										</a>
								</div>
						</div>
						<div>
								<button type="submit" form="translate" class="btn">send</button>
						</div>
				</main>

				<footer class="bottom-2 left-0 right-0 mb-2 md:absolute">
						<p class="text-center text-lg">
								© 2023
								<a href="https://github.com/dvlpr1996/php-translator-web-app-with-google" class="text-blue-800">
										dvlpr1996/php-translator-web-app-with-google
								</a>
								. All Rights Reserved.
						</p>
				</footer>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
		<script src="{{ asset('js/input.js') }}"></script>
		<script src="{{ asset('js/data/languageList.js') }}"></script>
</body>

</html>
