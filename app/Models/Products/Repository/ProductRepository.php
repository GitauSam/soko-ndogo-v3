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
    
    public function createProduct($data, $serviceOrder) {
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
            
            $serviceOrder->process_status = 2;
            $serviceOrder->transaction_status = 100;
            $serviceOrder->product_id = $product->id;
            $serviceOrder->response_message = "Saved product successfully. Images upload pending.";
            $serviceOrder->display_message = "Saved product successfully. Images upload pending.";
            $serviceOrder->save();

            $productImagesActivator = new ProductImagesActivator(new ProductImages());

            foreach($data->photos as $photo) {
                $productImagesActivator->addProductImage($product->id, $photo);
            }
        } catch (QueryException $e) {
            throw new CreateProductException($e);
        } 
    }

    public function fetchProductById($id) {
        try {
            return Product::findOrFail($id);
        } catch(QueryException $e) {
            throw new FetchProductException($e);
        }
    }

    public function fetchAllUserProducts() {
        try {
            return Product::
                where([['seller_id', auth()->user()->id], ['status', 1]])
                ->latest();
        } catch(QueryException $e) {
            throw new FetchProductException($e);
        }
    }

    public function updateProduct($data, $id) {
        try {
            $product = $this->fetchProductById($id);
            $product->product_name = $data->product_name;
            $product->quantity = $data->quantity;
            $product->unit = $data->qty_unit;
            $product->price = $data->price;
            $product->category = $data->category;

            $product->save();

            $productImagesActivator = new ProductImagesActivator(new ProductImages());

            foreach($data->photos as $photo) {
                $productImagesActivator->addProductImage($product->id, $photo);
            }

        } catch(QueryException $e) {
            throw new EditProductException($e);
        } catch(Exception $e) {
            throw new EditProductException($e);
        }
    }

    public function deactivateProduct($id) {
        try {
            $product = $this->fetchProductById($id);
            $product->status = 0;
            $product->save();
        } catch (QueryException $e) {
            throw new DeactivateProductException($e);
        } catch(Exception $e) {
            throw new EditProductException($e);
        }
    }
        
}
?>