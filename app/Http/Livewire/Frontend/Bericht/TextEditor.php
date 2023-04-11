<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use App\Models\BerichtText;
use Livewire\Component;

class TextEditor extends Component
{

    public $bericht;
    public $selectText;

    public $editTextRowId = null;

    public $berichtTexts;

    protected $listeners = [
        'edit-text' => 'editText',
        'refreshTextEditor' => '$refresh',
    ];

    public function mount(Bericht $bericht) {
        $this->bericht = $bericht;
        $texts = config("bericht_texts");
        $this->selectText = array_key_first($texts);
    }

    public function render()
    {
        $this->berichtTexts = BerichtText::where('cis_row_id_bericht',$this->bericht->cis_row_id)->get();
        return view('livewire.frontend.bericht.text-editor');
    }

    public function editText($cisRowId) {
        $this->editTextRowId = $cisRowId;
    }

    public function addText() {
        $texts = config("bericht_texts");

        $text = new BerichtText();
        $text->title = $texts[$this->selectText]['title'];
        $text->text = $texts[$this->selectText]['text'];
        $text->cis_row_id_bericht = $this->bericht->cis_row_id;
        $text->save();
        $this->editText($text->cis_row_id);
    }
}
