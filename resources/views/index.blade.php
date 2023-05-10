@extends('layouts.master')

@section('title', config('app.app_name'))

@section('main')
		<!-- container -->
		<div class="mx-auto max-w-6xl" x-bind:class="{ 'dark': darkMode === true }">

				<!-- nav bar -->
				@include('layouts.nav')

				<h1 class="mt-5 text-center text-2xl md:mt-10 md:text-5xl">
						Php Translator Web App With Google
				</h1>

				<!-- show form error -->
				<div class="mt-5 w-full md:w-6/12 mx-auto">
						@component('errors')
						@endcomponent
				</div>

				<!-- main content -->
				<main class="mt-5 flex flex-col items-center justify-between gap-0 md:mt-20 md:flex-row md:gap-5">

						<!-- translate form -->
						<div class="w-full md:w-6/12">
								<form action="{{ route('translate') }}" method="post" id="translate">
										{{ csrfTokenInput() }}
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

						<!-- translate to -->
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
										<textarea id="textToCopy" name="translatedText" readonly>
                      {{ $translated ?? '' }}
                    </textarea>

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
@endsection
