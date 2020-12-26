<?php

namespace App\Modules\Products;

use App\Models\Products\Repository\ProductRepository;
use App\Models\Products\Product;

class ProductActivator 
{
    public function __construct() {
        $this->model = new Product();
        $this->modelRepository = new ProductRepository($this->model);
    }

    public function addProduct($data, $serviceOrder) {
        return $this->modelRepository->createProduct($data, $serviceOrder);
    }

    public function returnProductById($id, $serviceOrder) {
        return $this->modelRepository->fetchProductById($id, $serviceOrder);
    }

    public function returnAllUserProducts() {
        return $this->modelRepository->fetchAllUserProducts();
    }

    public function editProduct($data, $id, $serviceOrder) {
        return $this->modelRepository->updateProduct($data, $id, $serviceOrder);
    }

    public function removeProduct($id) {
        return $this->modelRepository->deactivateProduct($id);
    }
}


?>