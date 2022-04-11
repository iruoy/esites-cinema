@extends('layouts.app')

@section('content')
    <h1 class="pt-8 text-3xl font-bold">Seats</h1>
    <div class="mt-8 bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <livewire:components.seats :seats="$seats" />
        </div>
    </div>
@endsection
