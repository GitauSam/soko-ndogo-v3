<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{

    public $image = array();

    protected $listeners = ['fileUpload' => 'addChosenImage'];

    public function addChosenImage($imageData) {
        $this->image[] = $imageData;
        // dump(count($this->image));
        // dump($this->image);
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
