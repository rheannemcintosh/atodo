<x-guest-layout>
    <div class="p-2 space-y-2">
        @if(config('app.status') == "Coming Soon")
            <h1 class="text-white font-atodo text-center font-black text-7xl">Atodo</h1>
            <h2 class="text-white font-atodo text-center text-3xl">Coming Soon!</h2>
        @else
            <h1 class="text-white font-atodo text-center font-black text-7xl">Atodo</h1>
        @endif
    </div>
</x-guest-layout>
