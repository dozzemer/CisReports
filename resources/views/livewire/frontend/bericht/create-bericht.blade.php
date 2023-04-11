<div>
    @include("layout.error_success")
    <p class="mb-4 mt-4">
        Bitte wählen Sie eine Berichtsart:
    </p>
    <div class="flex space-x-3">
        <div class="flex flex-col items-center justify-center cursor-pointer bg-slate-200 p-5 rounded hover:bg-slate-300 @if($berichtType == "uebung") bg-yellow-300 hover:bg-yellow-300  @endif "  wire:click="setBerichtType('uebung')">
            <i class="fa fa-dumbbell text-2xl"></i>
            <p>Übungsbericht</p>
        </div>
        <div class="flex flex-col items-center justify-center cursor-pointer bg-slate-200 p-5 rounded hover:bg-slate-300 @if($berichtType == "einsatz") bg-yellow-300 hover:bg-yellow-300  @endif " wire:click="setBerichtType('einsatz')">
            <i class="fa fa-bell text-2xl"></i>
            <p>Einsatzbericht</p>
        </div>
    </div>

    <button class="cis-submit" wire:click="createBericht">Bericht angelgen und bearbeiten</button>
</div>
