<div class="text-center py-6">
    <p class="mb-4 font-bold">Zugang zum Verwaltungsbereich</p>

    @if($user->cis_row_id == auth()->user()->cis_row_id)
        <i class="fa fa-circle-xmark" class="" style="font-size: 6em;"></i>
        <p>Der Zugang zum Verwaltungsbereich kann nur anderen Nutzern entzogen werden.</p>
    @else
        @if($user->backend_access)
            Der Zugangs zum Verwaltungsbereich ist aktuell <span class="text-green-700">aktiviert</span>.
            <p>
            <a href="#changeStatus" wire:click='disableBackendAccess'>
                <i class="fa fa-toggle-on text-green-600 text-2xl"></i>
            </a>
            </p>
        @else
            Der Zugangs zum Verwaltungsbereich ist aktuell <span class="text-red-700">nicht aktiviert</span>.
            <p>
                <a href="#changeStatus" wire:click='enableBackendAccess'>
                    <i class="fa fa-toggle-off text-red-600 text-2xl"></i>
                </a>
            </p>
        @endif
    @endif
</div>
