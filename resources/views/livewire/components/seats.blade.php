<div class="flex flex-wrap justify-center gap-2">
    @foreach($seats as $seat)
        @if($seat->taken)
            <div class="w-8 h-8 bg-red-300"></div>
        @elseif(in_array($seat->id, [39, 40, 41], true))
            <div class="w-8 h-8 border-2 border-yellow-500 bg-yellow-300">
                <p class="text-center font-bold">{{ $seat->id }}</p>
            </div>
        @else
            <div class="w-8 h-8 border-2">
                <p class="text-center font-bold">{{ $seat->id }}</p>
            </div>
        @endif
    @endforeach
</div>
