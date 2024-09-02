@props(['tagsCsv'])

@php($tags = explode(',', $tagsCsv))


<ul class="flex">
    @foreach ($tags as $tag)
    <a href="/?tag={{$tag}}" class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs focus:ring-blue-300 dark:bg-white-600 dark:hover:bg-blue-700 dark:focus:ring-white-800">
        <li>
            {{ $tag }}
        </li>
    </a>
    @endforeach
</ul>
