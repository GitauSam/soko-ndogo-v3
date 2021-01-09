<?php

namespace App\Modules\Orders;

use App\Models\Orders\Repository\OrderRepository;
use App\Models\Orders\Orders;

class OrderActivator 
{
    public function __construct() {
        $this->model = new Orders();
        $this->modelRepository = new OrderRepository($this->model);
    }

    public function addOrder($data, $serviceOrder) {
        return $this->modelRepository->createOrder($data, $serviceOrder);
    }

    public function returnOrderById($id, $serviceOrder) {
        return $this->modelRepository->fetchOrderById($id, $serviceOrder);
    }

    public function returnAllUserOrders($serviceOrder) {
        return $this->modelRepository->fetchAllUserOrders($serviceOrder);
    }

    public function returnAllNonServicedOrders($serviceOrder) {
        return $this->modelRepository->fetchNonServicedOrders($serviceOrder);
    }

    public function editOrder($data, $id, $serviceOrder) {
        return $this->modelRepository->updateOrder($data, $id, $serviceOrder);
    }

    public function removeOrder($id, $serviceOrder) {
        return $this->modelRepository->deactivateOrder($id, $serviceOrder);
    }
}


?>
