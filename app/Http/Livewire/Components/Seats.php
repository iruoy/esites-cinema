<?php

namespace App\Http\Livewire\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Seats extends Component
{
    public Collection $seats;

    public function render(): View
    {
        return view('livewire.components.seats');
    }
}
