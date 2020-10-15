<?php

namespace App\Models\Products\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\Products\Product;
use App\Models\Products\ProductImages;
use App\Modules\Products\ProductImagesActivator;
// use App\Exceptions\EditProductException;
use App\Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\CreateProductException;

class ProductRepository
{
    public function __construct(Product $product) {
        $this->model = $product;
    }
    
    public function createProduct($data) {
        try {
            $product = $this->model->create(
                            array(
                                'seller_id' => Auth::id(),
                                'product_name' => $data->product_name,
                                'quantity' => $data->quantity,
                                'unit' => $data->qty_unit,
                                'price' => $data->price,
                                'category' => $data->category,
                                'status'=> 1,
                                'no_of_images' => count($data->photos),
                            )
                        );

            $productImagesActivator = new ProductImagesActivator(new ProductImages());

            foreach($data->photos as $photo) {
                $productImagesActivator->addProductImage($product->id, $photo);
            }
        } catch (QueryException $e) {
            throw new CreateProductException($e);
        }
    }


        
}
?>