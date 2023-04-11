<div>
    <div class="flex mb-3">
        <select wire:model="selectText" class="p-1">
            @foreach(config('bericht_texts') as $key => $value)
                <option value="{{ $key }}">{{ $value['title'] }}</option>
            @endforeach
        </select>
        <button class="ml-3 border text-sm p-1" wire:click="addText">Hinzufügen</button>
    </div>

    @foreach($berichtTexts as $text)
        @livewire("frontend.bericht.text-editor-text",['text' => $text],key($text->cis_row_id))
    @endforeach

    @if(!$berichtTexts->count())
        <hr>
        <div class="text-sm mt-4">
            Es sind noch keine Berichtstexte vorhanden
        </div>
    @endif
</div>
