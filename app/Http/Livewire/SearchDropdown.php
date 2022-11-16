<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    // value coming from search input field
    public $search = '';

    public function render()
    {
        // define null array
        $searchResults = [];

        // start showing dropdown menu if $search lenght greater then or equal to 2
        if (strlen($this->search >= 2)){
            $searchResults = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
                            ->json()['results'];
        }

        // rendering view
        return view('livewire.search-dropdown')->with([
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
