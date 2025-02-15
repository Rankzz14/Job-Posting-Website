@extends('layout')
@section('content')
<x-user-hero :user="$user"></x-user-hero>
<div class="text-white text-center grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 space-y-4 md:space-y-0 ">
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
