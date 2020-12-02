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

    public function returnProductById($id) {
        return $this->modelRepository->fetchProductById($id);
    }

    public function returnAllUserProducts() {
        return $this->modelRepository->fetchAllUserProducts();
    }

    public function editProduct($data, $id) {
        return $this->modelRepository->updateProduct($data, $id);
    }

    public function removeProduct($id) {
        return $this->modelRepository->deactivateProduct($id);
    }
}


?>