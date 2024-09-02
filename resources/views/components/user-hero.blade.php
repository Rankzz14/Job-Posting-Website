@props(['user'])
<section class="relative h-48 bg-laravel justify-center align-center text-center space-y-4 pt-16 mb-3">

    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-600">
            {{ $user->name }}
        </span>
    </h1>
</section>
