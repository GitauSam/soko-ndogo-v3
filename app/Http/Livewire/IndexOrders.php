<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Orders\OrderActivator;
use App\Exceptions\DeactivateOrderException;
use App\Exceptions\EditOrderException;
use App\Exceptions\FetchOrderException;
use Livewire\WithPagination;

// Log Imports
use App\Models\ServiceOrder\ServiceOrder;

// Notifications Imports
use App\Notifications\DeleteOrderFailed;
use App\Notifications\DeleteOrderSuccessful;

class IndexOrders extends Component
{
    use WithPagination;    

    public function deactivateOrder($id) 
    {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'deactivate-order';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->display_message = 'Process to deactivate order started.';
        
        $serviceOrder->save();

        try {

            $orderActivator = new OrderActivator();
            $orderActivator->removeOrder($id, $serviceOrder);

            auth()->user()->notify(new DeleteOrderSuccessful());

        } catch (DeactivateOrderException $e) {

            $serviceOrder->display_message = "Unable to delete order.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Failed to delete order with ID: " . $id . ". Exception: " .$e->getMessage(). ".";

            auth()->user()->notify(new DeleteOrderFailed());

        } catch(EditOrderException $e) {

            $serviceOrder->display_message = "Unable to delete order.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Failed to delete order with ID: " . $id . ". Exception: " .$e->getMessage(). ".";

            auth()->user()->notify(new DeleteOrderFailed());

        }
    }

    public function render()
    {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'render-orders';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->display_message = 'Process to render order started.';
        
        $serviceOrder->save();

        try {
            $orderActivator = new OrderActivator();
            $orders = $orderActivator
                        ->returnAllUserOrders($serviceOrder)
                        ->paginate(10);

            return view('livewire.index-orders', ["orders" => $orders]);     
        } catch(FetchOrderException $e) {

            $serviceOrder->display_message = "Failed to fetch user orders.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Failed to fetch user orders Exception: " .$e->getMessage();

            $serviceOrder->save();

            return view('livewire.index-orders', ["orders" => []]);
        }
    }
}
