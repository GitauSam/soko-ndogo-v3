<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Products\ProductImagesActivator;
use App\Exceptions\DeactivateProductImageException;

class EditImageTemplate extends Component
{

    public $product;
    public $loc;

    public function mount($product, $loc) {
        $this->product = $product;
        $this->loc = $loc;
    }

    public function deactivateProductImage($id) {
        try {
            $productImagesActivator = new ProductImagesActivator();
            $productImagesActivator->deactivateProductImage($id);
        } catch (DeactivateProductImageException $e) {
            // add logic to handle exception
        }
    }

    public function render()
    {
        return view('livewire.edit-image-template');
    }
}
