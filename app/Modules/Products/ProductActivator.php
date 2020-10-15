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

    public function addProduct($data) {
        return $this->modelRepository->createProduct($data);
    }
}


?>