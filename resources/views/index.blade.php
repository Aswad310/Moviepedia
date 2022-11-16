{{--{{dd($popularMovies)}}--}}
{{--{{dd($nowPlayingMovies)}}--}}
{{--{{dd($genres)}}--}}
@extends('layouts.main')
@section('content')
    <!-- popular movies section starts-->
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach($popularMovies as $movie)
                    <x-movie-card :$movie :$genres />
                @endforeach
            </div>
        </div>
        <!-- popular movies section ends-->

        <!-- now playing section starts-->
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach($nowPlayingMovies as $movie)
                    <x-movie-card :$movie :$genres />
                @endforeach
            </div>
        </div>
        <!-- now playing section ends-->
    </div>
@endsection
