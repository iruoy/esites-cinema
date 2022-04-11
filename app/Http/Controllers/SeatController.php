<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Contracts\View\View;

class SeatController extends Controller
{
    public function index(): View
    {
        $seats = Seat::all();

        return view('seats.index', compact('seats'));
    }
}
