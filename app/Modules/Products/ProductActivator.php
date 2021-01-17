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

    public function returnAllUserProducts($serviceOrder) {
        return $this->modelRepository->fetchAllUserProducts($serviceOrder);
    }

    public function returnAllPurchasedProducts($serviceOrder) {
        return $this->modelRepository->fetchAllPurchasedProducts($serviceOrder);
    }

    public function returnPurchasedProductsByCategory($category, $serviceOrder) {
        return $this->modelRepository->fetchPurchasedProductsByCategory($category, $serviceOrder);
    }

    public function returnAllNonPurchasedProducts($serviceOrder) {
        return $this->modelRepository->fetchAllNonPurchasedProducts($serviceOrder);
    }

    public function returnAllPurchasedProductsByCategory($category, $serviceOrder) {
        return $this->modelRepository->fetchAllPurchasedProductsByCategory($category, $serviceOrder);
    }

    public function editProduct($data, $id, $serviceOrder) {
        return $this->modelRepository->updateProduct($data, $id, $serviceOrder);
    }

    public function removeProduct($id, $serviceOrder) {
        return $this->modelRepository->deactivateProduct($id, $serviceOrder);
    }

    public function purchaseProduct($product, $serviceOrder) {
        return $this->modelRepository->purchaseProduct($product, $serviceOrder);
    }

}


?>