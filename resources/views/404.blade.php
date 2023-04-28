@extends('layouts.master')

@section('title', '404 Page')

@section('main')
		<!-- container -->
		<div class="flex h-screen items-center justify-center space-y-5" x-bind:class="{ 'dark': darkMode === true }">

				<h1 class="text-5xl">404 Page Not Found 🧐</h1>
        
				<a href="{{ route('home') }}" class="btn block capitalize">
						back to home page
				</a>

		</div>
@endsection
