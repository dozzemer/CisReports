<div>
    @if($confirmClose)
        <div class="absolute top-0 left-0 w-screen h-screen opacity-80 bg-slate-700">
            <div class="flex items-center justify-center w-full h-full">
                <div class="bg-slate-50 p-4 rounded">
                    <p class="font-semibold">Möchten Sie den Bericht wirklich abschließen?</p>

                    <div class="flex space-x-4">
                        <button class="cis-submit" wire:click="closeBericht">Bericht abschließen</button>
                        <button class="cis-submit bg-slate-700" wire:click="$toggle('confirmClose')">Abbrechen</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <h3 class="mb-4 text-xl font-semibold">Bericht abschließen</h3>
    <p>
        Der Einsatzbericht wird Ihnen nach Abschluss per E-Mail zugeschickt.
    </p>
    <p>
        Bitte überprüfen Sie vor Abschluss alle Angaben.
    </p>

    @if($berichtCheck)
    <button type="button" wire:click="$toggle('confirmClose')" class="cis-submit bg-slate-700">Abschließen</button>
    @else
        <p class="mt-4 text-red-700">Um den Bericht abschließen zu können, muss mindestens ein Berichttext vorhanden sein.</p>
    @endif
</div>
