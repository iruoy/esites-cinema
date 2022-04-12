<?php

namespace App\Http\Livewire\Components;

use App\Models\Seat;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Seats extends Component
{
    public array $highlighted;
    public int $reserve;
    public Collection $seats;

    public function render(): View
    {
        return view('livewire.components.seats');
    }

    public function submit()
    {
        Seat::whereIn('id', $this->highlighted)->update(['taken' => true]);
        $this->mount();
    }

    public function mount()
    {
        $this->highlighted = [];
        $this->reserve = 1;
        $this->seats = Seat::orderBy('id')->get();

        $this->findSeats();
    }

    private function findSeats(): void
    {
        $options = [];

        $consecutive = [];
        foreach ($this->seats->pluck('taken', 'id') as $place => $taken) {
            if ($taken) {
                if ($consecutive !== []) {
                    $options[] = $consecutive;

                    $consecutive = [];
                }
            } else {
                $consecutive[] = $place;

                // if the requested number of seats is low enough we can stop here
                if (count($consecutive) === $this->reserve) {
                    $this->highlighted = $consecutive;
                    return;
                }
            }
        }

        // if the last seat was empty it wouldn't have been added to the options
        if ($consecutive !== []) {
            $options[] = $consecutive;
        }

        // if there are not enough seats available, show no options
        if ($this->reserve > count($options, COUNT_RECURSIVE) - count($options)) {
            $this->highlighted = [];
            return;
        }

        $options_lengths = [];

        // count all groups of consecutive seats
        foreach ($options as $option) {
            $options_lengths[] = count($option);
        }

        $seats = [];

        // add seats until our requirement is met
        while (count($seats) < $this->reserve) {
            // start with the largest option possible
            $option_key = array_search(max($options_lengths), $options_lengths);

            if ($this->reserve - count($seats) < count($options[$option_key])) {
                // if the current option satisfies our demand we check if there is a smaller one available
                $option_key = array_search($this->reserve - count($seats), $options_lengths) ?? $option_key;

                $seats = array_merge($seats, array_slice($options[$option_key], 0, $this->reserve - count($seats)));
            } else {
                $seats = array_merge($seats, $options[$option_key]);

                // remove the option we just grabbed from the lists
                unset($options[$option_key]);
                unset($options_lengths[$option_key]);
            }
        }

        $this->highlighted = $seats;
    }

    public function updatedReserve()
    {
        $this->findSeats();
    }
}
