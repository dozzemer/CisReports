<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\BerichtText;
use Livewire\Component;

class TextEditorText extends Component
{

    public BerichtText $berichtText;
    public $text;
    public $title;
    public $showConfirm = false;

    public $deleted = false;


    public function mount(BerichtText $text) {
        $this->berichtText = $text;
        $this->text = $this->berichtText->text;
        $this->title = $this->berichtText->title;
    }
    public function render()
    {
        return view('livewire.frontend.bericht.text-editor-text');
    }

    public function updated() {
        $this->berichtText->text = $this->text;
        $this->berichtText->title = $this->title;
        $this->berichtText->save();
    }

    public function delete() {
        $this->berichtText->delete();
        $this->deleted = true;
    }

}
