@if (!empty(getSession('error')))
		<ul class="space-y-5 rounded-lg bg-rose-400 p-3">
				@foreach (getSession('error') as $item)
						<li class="capitalize text-rose-800">{{ $item }}</li>
						@php
								delSession('error');
						@endphp
				@endforeach
		</ul>
@endif
