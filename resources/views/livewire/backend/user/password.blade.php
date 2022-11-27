<div>
    <p class="text-xs mb-3">
        Bitte geben Sie das neue Passwort im ersten Feld ein. Im zweiten Feld geben Sie bitte erneut das Passwort ein, um Fehleingaben auszuschließen.
    </p>

    @if($success)
        <div class="cis-success">
            Das Passwort wurde erfolgreich gesetzt.
        </div>
    @endif

    <form wire:submit.prevent='submit'>
        <div class="cis-form-group">
            <div>Neues Passwort</div>
            <input wire:model='password' type="password" @error('password') class="is-invalid" @endif>
        </div>
        <div class="cis-form-group">
            <div>Neues Passwort wiederholen</div>
            <input wire:model='password_confirmation' type="password" @error('password_confirmation') class="is-invalid" @endif>
        </div>
        <button type="submit" class="cis-submit">Neues Passwort setzen</button>
    </form>
</div>
