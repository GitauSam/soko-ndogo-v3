<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Orders\OrderActivator;

// Exceptions
use App\Exceptions\FetchOrderException;

class AdminIndexOrders extends Component
{

    public $serviceOrder;

    public function mount($serviceOrder)
    {

        $this->serviceOrder = $serviceOrder;

    }

    public function render()
    {

        try {

            $orderActivator = new OrderActivator();
            $this->orders =  $orderActivator
                                ->returnAllNonServicedOrders($this->serviceOrder)
                                ->paginate(5);
            return view('livewire.admin-index-orders', ['orders' => $this->orders]);

        } catch (FetchOrderException $e) {
            return view('livewire.admin-index-orders', ['orders' => []]);
        }

    }
}
