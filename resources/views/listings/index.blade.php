@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')

<div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 3xl:grid-cols-6 gap-4 space-y-0">
    @unless(count($listings) == 0)

    @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach

    @else

    <p>No listings found</p>

    @endunless
</div>

<div class="mt-6 p-4">
    {{ $listings->links() }}
</div>

@endsection
