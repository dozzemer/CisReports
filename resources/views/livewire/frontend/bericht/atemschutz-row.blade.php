<tr>
    <td class="w-8 text-center">
        <span wire:dirty wire:target="pa_nr,pa_time,pa_work">
            <i class="fa fa-spinner animate-spin"></i>
        </span>
    </td>
    <td>{{ $user->fullname() }}</td>
    <td>
        <input type="text" class="border-0 bg-slate-200 rounded p-2 w-20" wire:model.lazy="pa_nr" wire:model.debounce.1s="pa_nr">
    <td>
        <input type="text" class="border-0 bg-slate-200 rounded p-2 w-20" wire:model.lazy="pa_time" wire:model.debounce.1s="pa_time">
    </td>
    <td>
        <input type="text" class="border-0 bg-slate-200 rounded p-2 w-full" wire:model.lazy="pa_work" wire:model.debounce.1s="pa_work">
    </td>
</tr>
