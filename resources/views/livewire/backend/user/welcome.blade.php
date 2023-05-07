<div>
    @if($initialLogin)
        <p class="text-emerald-500">Willkommens-Modus ist aktiv</p>
        <p class="text-sm">Der Willkommens-Modus kann durch setzten eines Passwortes deaktiviert werden.</p>
    @else
        <p class="cursor-pointer underline underline-offset-4" wire:click="$toggle('confirmation')"><i class="fa fa-door-open"></i> Willkommens-Modus aktivieren</p>
    @endif


    @if($confirmation)
            <div class="absolute top-0 left-0 w-screen h-screen opacity-80 bg-slate-700">

            </div>
            <div class="absolute top-0 left-0 w-screen h-screen">
                <div class="flex items-center justify-center w-full h-full">
                    <div class="bg-slate-50 p-4 rounded">
                        <p class="font-semibold">Möchten Sie den Benutzer in den Willkommens-Modus setzen?</p>
                        <p class="text-sm">Der Benutzter bekommt per E-Mail einen Willkommens-Code zugesand.<br>Der Benutzer kann sich bis zur Kontoeinrichtung mit dem Code nicht anmelden.</p>

                        <div class="flex space-x-4">
                            <button class="cis-submit" wire:click="setWelcome">Willkommens-Modus aktivieren</button>
                            <button class="cis-submit bg-slate-700" wire:click="$toggle('confirmation')">Abbrechen</button>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>
