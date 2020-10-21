<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Orders\OrderActivator;
use App\Exceptions\DeactivateOrderException;
use App\Exceptions\EditOrderException;
use App\Exceptions\FetchOrderException;

class IndexOrders extends Component
{
    public $orders = [];    

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
            $this->orders = $orderActivator->returnAllUserOrders();

            return view('livewire.index-orders');
                // ->with('i', (request()->input('page', 1) - 1) * 5);              
        } catch(FetchOrderException $e) {
            // add logic to handle exception here
        }
    }
}
