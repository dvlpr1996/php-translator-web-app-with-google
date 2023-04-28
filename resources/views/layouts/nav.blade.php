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
