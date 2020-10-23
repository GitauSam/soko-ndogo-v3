<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Orders\OrderActivator;
use App\Exceptions\DeactivateOrderException;
use App\Exceptions\EditOrderException;
use App\Exceptions\FetchOrderException;
use Livewire\WithPagination;

class IndexOrders extends Component
{
    use WithPagination;    

    public function deactivateOrder($id) {
        try {
            $orderActivator = new OrderActivator();
            $orderActivator->removeOrder($id);
        } catch (DeactivateOrderException $e) {
            // add logic to handle exception here

        } catch(EditOrderException $e) {
            // add logic to handle exception here

        }
    }

    public function render()
    {
        try {
            $orderActivator = new OrderActivator();
            $orders = $orderActivator
                        ->returnAllUserOrders()
                        ->paginate(10);

            return view('livewire.index-orders', ["orders" => $orders]);        
        } catch(FetchOrderException $e) {
            // add logic to handle exception here
        }
    }
}
