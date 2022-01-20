@extends('layouts.main')

@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popular-actors">
        <h2 class="uppercase tracking-wider text-orange-500 mx-auto text-lg font-semibold">Popular Actors</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
            @foreach ($popularActors as $actor)
                <div class="actor mt-8">
                    @if ($actor['profile_path'])
                        <a href="#"><img src="{{ 'https://image.tmdb.org/t/p/w500/'.$actor['profile_path'] }}" width="200px" alt="image"
                        class="hover:opacity-75 transition ease-in-out duration-150"
                        ></a>
                    @else
                        <img src="https://via.placeholder.com/50x75" alt="image" class="w-54" width="200px">
                    @endif

                    <div class="mt-2">
                        <a href="#" class="text-lg hover:text-gray-300">
                            {{ $actor['name'] }}
                        </a>
                        <div class="text-sm break-normal text-gray-400">Iron Man</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
