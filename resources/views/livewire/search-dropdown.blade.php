<div class="flex items-center my-2" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <div class="relative">
        <input
        wire:model.debounce.500ms="search"
        type="text"
        class="bg-gray-700 text-sm rounded-full w-64 pl-8 px-4 py-1 focus:shadow-outline"
        placeholder="Search"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @keydown = " isOpen = true"
        @focus = " isOpen = true">
        <div wire:loading class="spinner right-0 top-0 mr-4 mt-3"></div>
    </div>

    <div class="absolute top-B">
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 w-4 ml-2"
        viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5"
        stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
    </div>
    <div class="ml-3 flex flex-col md:flex-row items-center">
        <a href="#">
            <img src="/images/user.png" alt="avatar" class="w-7">
        </a>
    </div>

    <div class="z-50 absolute bg-gray-700 rounded w-64 mt-80 text-sm" style="margin-top=100px" x-show="isOpen" x-transition>
        <ul>
            @foreach ($searchResults as $results)
                <li class="border-b border-gray-600">
                    <a href="{{ route('movie.show', $results['id']) }}"
                    class="block hover:bg-gray-600 px-3 py-2 flex items-center"
                    @if ($loop->last)
                        @keydown.tab = "isOpen = false"
                    @endif

                    >
                        @if ($results['poster_path'])
                            <img src="{{ 'https://image.tmdb.org/t/p/w92/'. $results['poster_path'] }}" alt="poster" class="w-8">
                        @else
                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                        @endif

                        <span class="ml-4">{{ $results['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
