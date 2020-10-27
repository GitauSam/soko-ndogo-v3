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

    public function addOrder($data) {
        return $this->modelRepository->createOrder($data);
    }

    public function returnOrderById($id) {
        return $this->modelRepository->fetchOrderById($id);
    }

    public function returnAllUserOrders() {
        return $this->modelRepository->fetchAllUserOrders();
    }

    public function editOrder($data, $id) {
        // return $this->modelRepository->updateProduct($data, $id);
    }

    public function removeOrder($id) {
        return $this->modelRepository->deactivateOrder($id);
    }
}


?>
