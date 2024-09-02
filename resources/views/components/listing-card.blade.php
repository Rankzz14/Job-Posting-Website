@props(['listing'])
@php
use Illuminate\Support\Str;
@endphp

<x-card>
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <a href="/listings/{{$listing->id}}" class="break-words">{{ $listing['title'] }} </a>
        </h5>

        <p class="text-pretty w-full mb-3 font-normal text-gray-700 dark:text-gray-400 break-words">
            {{ Str::limit($listing['description'], 150) }}
        </p>

        <div class="pb-4">
            <x-listing-tags :tagsCsv="$listing['tags']"></x-listing-tags>
        </div>

        <div class="flex justify-end items-end mt-auto">
            <a href="/listings/{{$listing->id}}" class=" inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

    </div>
</x-card>




<!-- <div class="bg-grey-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img class="hidden w-48 me-6 md:block" src="{{asset('images/no-image.png')}}" alt="">
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">
                    {{ $listing->title }}
                </a>
            </h3>
            <div class="text-xl font-bold mb-4">
                {{ $listing->company }}
            </div>
            <x-listing-tags :tagsCsv="$listing['tags']"></x-listing-tags>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{ $listing->location }}

            </div>
        </div>
    </div>
</div> -->
