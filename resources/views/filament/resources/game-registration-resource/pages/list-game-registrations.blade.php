<x-filament::page>
    <div>
        <h2 class="text-xl font-bold mb-4">Juegos Individuales</h2>
        {{ $this->getIndividualTable() }}

        <h2 class="text-xl font-bold mt-8 mb-4">Juegos Grupales</h2>
        {{ $this->getGroupTable() }}
    </div>
</x-filament::page>
