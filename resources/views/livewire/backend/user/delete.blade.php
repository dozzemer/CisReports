<div>
    @include("layout.error_success")
    <p>Um den Anwender zu löschen, geben Sie bitte den folgenden Bestätigungscode an:</p>

    <p class="text-slate-600 bg-slate-200 my-5 font-bold rounded p-2">
        {{ $confirmation }}
    </p>

    <form wire:submit.prevent='submit'>
        <div class="cis-form-group">
            <div>Bestätigungscode</div>
            <input type="text" wire:model='confirmationF_input' @error("confirmation") class="is-invalid" @enderror>
        </div>
        <button class="cis-submit bg-red-600" type="submit">Anwender löschen</button>
    </form>
</div>
