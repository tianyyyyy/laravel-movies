@extends('layouts.main')

@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popular-tvseries">
        <h2 class="uppercase tracking-wider text-orange-500 mx-auto text-lg font-semibold">Popular Tv Series</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
            @foreach ($Tvseries as $series)
                <x-tv-card :series="$series" :genres="$genres"/>
            @endforeach
        </div>
    </div>
</div>

@endsection
