<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Products\ProductActivator;
use App\Exceptions\FetchProductException;
use App\Models\Products\Product;
use Livewire\WithPagination;

class IndexProducts extends Component
{

    use WithPagination;

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
            $products = $productActivator
                                ->returnAllUserProducts()
                                ->paginate(10);

            return view('livewire.index-products', ['products' => $products]); 
        } catch(FetchProductException $e) {
            // add logic to handle exception here
        }
    }
}
