@extends('layout')
@section('content')
@include('partials._search')

<a href="/" class="w-20 ml-8 mb-4 text-white leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5"><i class="fa-solid fa-arrow-left pr-2"></i> Back </a>
<div class="mx-4 grid grid-cols-12 text-white">
    <x-card class="max-w-3xl bg-laravel rounded-3xl px-6 pb-10 grid grid-cols-subgrid col-span-6 col-start-4">
        <div class="flex flex-col items-center justify-center text-center col-span-8">
            <x-card class="flex-row mt-4 p-2 flex space-x-6 col-">

                <form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <i class="fa-solid fa-trash"></i>Delete
                    </button>
                </form>

                <a href="/listings/{{$listing->id}}/edit" class="flex justify-end">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>

            </x-card>
            <img
                class="w-96 pt-4 h-full"
                src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                alt="" />
            <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing['tags']"></x-listing-tags>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <div class="border border-white w-full mb-6"></div>
            <div class="w-full max-w-3xl ">
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6 w-full overflow-hidden">
                    {{$listing->description}}
                    <a
                        href="mailto:{{$listing->email}}"
                        class="block bg-mavi text-white mt-6 py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-envelope"></i>
                        Contact Employer
                    </a>
                    <a
                        href="{{$listing->website}}"
                        target="_blank"
                        class="block bg-mavi text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-globe"></i> Visit
                        Website
                    </a>
                </div>
            </div>
        </div>
    </x-card>
</div>

@endsection
