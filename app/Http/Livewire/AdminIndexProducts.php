<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Products\ProductActivator;

class AdminIndexProducts extends Component
{

    public $serviceOrder;

    public function mount($serviceOrder) 
    {

        $this->serviceOrder = $serviceOrder;

    }

    public function render()
    {

        try {
            $productActivator = new ProductActivator();
            $products = $productActivator
                                ->returnAllNonPurchasedProducts($this->serviceOrder)
                                ->paginate(5);

            return view('livewire.admin-index-products', ['products' => $products]); 
        } catch(FetchProductException $e) {
            // add logic to handle exception here

            return view('livewire.admin-index-products', ['products' => []]);   
        }

    }
}
