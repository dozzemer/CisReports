<tr>
    <td>{{ $user->fullname() }}</td>
    <td>
        <select wire:model="job" class="p-1 @if($job != $defaultJob) bg-red-200 @endif">
            @foreach($jobs as $j)
                <option value="{{ $j->cis_row_id }}">{{ $j->name }}</option>
            @endforeach
        </select>
    </td>
    @foreach($einsatzmittel as $em)
        <td>
            <div class="w-10 h-10 bg-slate-200 hover:bg-slate-300 rounded flex items-center justify-center text-slate-500" wire:click="setEinsatzmittel('{{ $em->cis_row_id }}')">
                @if($personalBericht->einsatzmittel == $em->cis_row_id)
                    <i class="fa fa-circle-xmark text-2xl"></i>
                @endif
            </div>
        </td>
    @endforeach
</tr>
