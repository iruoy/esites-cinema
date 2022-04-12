@extends('layouts.app')

@section('content')
    <div class="py-8">
        <div class="flex gap-4">
            <h1 class="text-3xl font-bold">Seats</h1>
            <livewire:components.reserve-seats />
        </div>

        <div class="mt-8 bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <livewire:components.seats :seats="$seats" />
            </div>
        </div>
    </div>
@endsection
