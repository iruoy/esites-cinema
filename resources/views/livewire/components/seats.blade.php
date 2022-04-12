<div class="py-8">
    <form class="flex gap-4" wire:submit.prevent="submit">
        <h1 class="text-3xl font-bold">Seats</h1>

        <label for="reserve" class="sr-only">Email</label>
        <input type="text" inputmode="numeric" name="reserve" id="reserve" class="w-20 border-2 @error('reserve') border-red-500 @else border-gray-200 @enderror" wire:model="reserve">

        <button type="submit" class="px-4 py-2 bg-white border-2 border-gray-200">Reserve</button>

        @error('reserve')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </form>

    <div class="mt-8 bg-white border-2 border-gray-200">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex flex-wrap justify-center gap-2">
                @foreach($seats as $seat)
                    @if($seat->taken)
                        <div class="w-12 h-12 bg-red-300"></div>
                    @elseif(in_array($seat->id, $highlighted, true))
                        <div class="w-12 h-12 border-2 border-yellow-500 bg-yellow-300">
                            <p class="py-2 text-center font-bold">{{ $seat->id }}</p>
                        </div>
                    @else
                        <div class="w-12 h-12 border-2">
                            <p class="py-2 text-center font-bold">{{ $seat->id }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
