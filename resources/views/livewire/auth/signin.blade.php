<div>
    <form wire:submit.prevent="submit">
        @csrf
        @error('auth-error') <span class="text-red-700 text-xs ml-3">{{ $message }}</span> @enderror
        <div>
            @error('user_key') <span class="text-red-700 text-xs ml-3">{{ $message }}</span> @enderror
            <input type="text" wire:model="user_key" class="border-b w-full my-2 p-3 text-sm" placeholder="BENUTZERNAME">
        </div>
        <div>
            @error('user_password') <span class="text-red-700 text-xs ml-3">{{ $message }}</span> @enderror
            <input type="password" wire:model="user_password" class="border-b w-full my-2 p-3 text-sm" placeholder="PASSWORT">
        </div>
        <div class="ml-2 text-xs text-emerald-600 font-bold mt-4">
            <a href="#">Passwort vergessen?</a>
        </div>

        <button type="submit" class="p-2 rounded-full bg-teal-600 text-white w-full mt-20 hover:bg-teal-500">Anmelden <i class="fa fa-right-to-bracket"></i> </button>
    </form>
</div>
