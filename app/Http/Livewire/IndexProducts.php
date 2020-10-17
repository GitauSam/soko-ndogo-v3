<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Products\ProductActivator;
use App\Exceptions\FetchProductException;

class IndexProducts extends Component
{

    public $products = [];    

    public function deactivateProduct($id) {
        try {
            $productActivator = new ProductActivator();
            $productActivator->removeProduct($id);
        } catch (DeactivateProductException $e) {
            // add logic to handle exception here

        } catch(EditProductException $e) {
            // add logic to handle exception here

        }
    }

    public function render()
    {
        try {
            $productActivator = new ProductActivator();
            $this->products = $productActivator->returnAllUserProducts();

            return view('livewire.index-products');
                // ->with('i', (request()->input('page', 1) - 1) * 5);              
        } catch(FetchProductException $e) {
            // add logic to handle exception here
        }
    }
}
