<?php

namespace App\Http\Livewire;

use App\Models\Products\ProductImages;
use Livewire\Component;
use App\Modules\Products\ProductImagesActivator;
use App\Exceptions\DeactivateProductImageException;

class EditImageTemplate extends Component
{

    public $productImages;
    public $product;
    public $loc;

    public function mount($loc, $product) {
        $this->product = $product;
        $this->loc = $loc;
    }

    public function deactivateProductImage($img) {
        try {
            $productImagesActivator = new ProductImagesActivator();
            $productImagesActivator->deactivateProductImage($img['image_name'], $this->product->id);
        } catch (DeactivateProductImageException $e) {
            // add logic to handle exception
        }
    }

    public function render()
    {
        $this->productImages = ProductImages::where('product_id', $this->product->id)->get();
        return view('livewire.edit-image-template');
    }
}
