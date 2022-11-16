{{--{{dd($searchResults)}}--}}
<div class="relative mt-3 md:mt-0" x-data="{isOpen:true}" @click.outside="isOpen=false">
        <input wire:model.debounce.500ms="search"
               type="text"
               class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:border-blue-500 focus:shadow-outline"
               placeholder="Search (Press '/' to focus)"
               x-ref="search"
               x-on:keydown.window.prevent.slash="$refs.search.focus()"
               @focus="isOpen=true"
               @keydown="isOpen=true"
               @keydown.esc.window="isOpen=false"
               @keydown.shift.tab="isOpen=false"
        >
        <div class="absolute top-0">
            <svg class="w-4 text-gray-500 mt-2 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </div>
        <!-- Loading Spinner -->
        <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    <!-- Dropdown Menu -->
    @if (strlen($this->search >= 2))
        <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show="isOpen" x-transition.opacity>
            @if(count($searchResults) > 0)
                <ul>
                    @foreach($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{route('movies.show', $result['id'])}}" class="block hover:bg-gray-700 flex items-center px-3 py-3" @if($loop->last) @keydown.tab="isOpen=false " @endif>
                                @if($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{$result['title']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{$search}}"</div>
            @endif
        </div>
    @endif
</div>
