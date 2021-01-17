<?php

namespace App\Models\Products\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\Products\Product;
use App\Models\Products\ProductImages;
use App\Modules\Products\ProductImagesActivator;

// Exceptions
use App\Exception;
use App\Exceptions\FetchProductException;
use App\Exceptions\FetchNonPurchasedProductException;
use App\Exceptions\FetchPurchasedProductException;
use App\Exceptions\EditProductException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\CreateProductException;

// Log imports
use App\Models\TransactionLog\TransactionLog;
use App\Models\ServiceOrder\ServiceOrder;

class ProductRepository
{
    public function __construct(Product $product) {
        $this->model = $product;
    }
    
    public function createProduct($data, $serviceOrder) {
        
        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "save-product";

        try {
            $product = $this->model->create(
                            array(
                                'seller_id' => Auth::id(),
                                'product_name' => $data->product_name,
                                'quantity' => $data->quantity,
                                'unit' => $data->qty_unit,
                                'price' => $data->price,
                                'category' => 'N/A',
                                'category_id' => $data->category,
                                'status'=> 1,
                                'no_of_images' => count($data->photos),
                            )
                        );
            
            $serviceOrder->process_status = 2;
            $serviceOrder->transaction_status = 100;
            $serviceOrder->product_id = $product->id;
            $serviceOrder->category_id = $product->category_id;
            $serviceOrder->response_message = "Saved product successfully. Images upload pending.";
            $serviceOrder->display_message = "Saved product successfully. Images upload pending.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Saved product successfully. Images upload pending.";
            $transactionLog->save();

            $productImagesActivator = new ProductImagesActivator(new ProductImages());

            foreach($data->photos as $photo) {
                $productImagesActivator->addProductImage($product->id, $photo, $serviceOrder);
            }

            return $product;

        } catch (QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to save product. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new CreateProductException($e);
        } 
    }

    public function fetchProductById($id, $serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "save (upload)-product";

        try {
            
            $product = Product::findOrFail($id);

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->product_id = $product->id;
            $serviceOrder->category_id = $product->category_id;
            $serviceOrder->response_message = "Fetched product successfully.";
            $serviceOrder->display_message = "Fetched product successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Fetched product successfully.";
            $transactionLog->save();

            return $product;

        } catch(ModelNotFoundException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch product. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchProductException($e);
        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch product. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchProductException($e);
        }
    }

    public function fetchAllUserProducts($serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch user products";

        try {

            $products = Product::
                            where([['seller_id', auth()->user()->id], ['status', 1]])
                            ->latest();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = $serviceOrder->response_message .  " Fetched all user products successfully.";
            $serviceOrder->display_message = $serviceOrder->display_message . " Fetched all user products successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Fetched all user products successfully.";
            $transactionLog->save();

            return $products;
        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch all user products. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchProductException($e);

        }
    }

    public function fetchAllNonPurchasedProducts($serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch non purchased products";

        try {
    
            $products = Product::
                        where([['purchased', FALSE], ['status', 1]])
                        ->latest();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = $serviceOrder->response_message .  " Fetched non purchased products successfully.";
            $serviceOrder->display_message = $serviceOrder->display_message . " Fetched non purchased products successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Fetched non purchased products successfully.";
            $transactionLog->save();

            return $products;

        } catch (QueryException $e) {
            
            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch non purchased products. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchNonPurchasedProductException($e);

        } catch (Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch non purchased products. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchNonPurchasedProductException($e);

        }

    }

    public function fetchAllPurchasedProducts($serviceOrder) 
    {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch all purchased products";

        try {
    
            $products = Product::
                        where([['purchased', TRUE], ['status', 1]])
                        ->latest();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = $serviceOrder->response_message .  " Fetched all purchased products successfully.";
            $serviceOrder->display_message = $serviceOrder->display_message . " Fetched all purchased products successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Fetched all purchased products successfully.";
            $transactionLog->save();

            return $products;

        } catch (QueryException $e) {
            
            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch all purchased products. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchPurchasedProductException($e);

        } catch (Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch all purchased products. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchPurchasedProductException($e);

        }
    }

    public function fetchAllPurchasedProductsByCategory($category, $serviceOrder) 
    {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch non purchased products by category";

        try {
    
            $products = Product::
                        where(
                            [['purchased', TRUE], 
                            ['status', 1]],
                            ['category', $category],
                            ['remainder', '!=', '0'])
                        ->latest();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = $serviceOrder->response_message .  " Fetched non purchased products by category successfully.";
            $serviceOrder->display_message = $serviceOrder->display_message . " Fetched non purchased products by category successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Fetched non purchased products by category successfully.";
            $transactionLog->save();

            return $products;

        } catch (QueryException $e) {
            
            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch non purchased products by category. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchNonPurchasedProductException($e);

        } catch (Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch non purchased products by category. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new FetchNonPurchasedProductException($e);

        }
    }

    public function updateProduct($data, $id, $serviceOrder) 
    {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "update-product";

        try {
            $product = $this->fetchProductById($id, $serviceOrder);
            $product->product_name = $data->product_name;
            $product->quantity = $data->quantity;
            $product->unit = $data->qty_unit;
            $product->price = $data->price;
            $product->category_id = $data->category;

            $product->save();

            $serviceOrder->process_status = 2;
            $serviceOrder->transaction_status = 100;
            $serviceOrder->product_id = $product->id;
            $serviceOrder->category_id = $product->category_id;
            $serviceOrder->response_message = "Updated product successfully. Images upload pending.";
            $serviceOrder->display_message = "Updated product successfully. Images upload pending.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Updated product successfully. Images upload pending.";
            $transactionLog->save();

            $productImagesActivator = new ProductImagesActivator(new ProductImages());

            if ($data->has('photos')) {

                foreach($data->photos as $photo) {
                    $productImagesActivator->addProductImage($product->id, $photo, $serviceOrder);
                }

            } else {
                $serviceOrder->process_status = 30;
                $serviceOrder->transaction_status = 30;
                $serviceOrder->response_message = "Updated product successfully. No images to upload.";
                $serviceOrder->display_message = "Updated product successfully. No images to upload.";
                $transactionLog->response_message = "Updated product successfully. No images to upload.";
                $transactionLog->save();
            }

            return $product;

        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to update product. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new EditProductException($e);
        } catch(Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to update product. Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();
            $serviceOrder->save();

            throw new EditProductException($e);
        }
    }

    public function deactivateProduct($id, $serviceOrder) 
    {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "deactivate-product";

        try {

            $product = $this->fetchProductById($id, $serviceOrder);
            $product->status = 0;
            $product->save();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->product_id = $product->id;
            $serviceOrder->category_id = $product->category_id;
            $serviceOrder->response_message .= " Product with id: " . $id 
                                                . " and name: " . $product->product_name 
                                                ." deactivated successfully.";
            $serviceOrder->display_message .= " Product: " . $product->product_name
                                                . " deactivated successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Product with id: " . $id 
                                                    . " and name: " . $product->product_name 
                                                    ." deactivated successfully.";
            $transactionLog->save();

            return $product;
        } catch (QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to deactivate product with id: " . $product->id 
                                                    . ". Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();
            $serviceOrder->save();

            throw new DeactivateProductException($e);
        } catch(Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to deactivate product with id: " . $product->id 
                                                    . ". Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();
            $serviceOrder->save();

            throw new EditProductException($e);
        }
    }

    public function purchaseProduct($product, $serviceOrder) 
    {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "purchase-product";

        try {
            
            $product->purchased = TRUE;

            $product->save();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->product_id = $product->id;
            $serviceOrder->category_id = $product->category_id;
            $serviceOrder->response_message = "Purchased product with id: " . $product->id 
                                                . " and name: " . $product->product_name
                                                . " successfully.";
            $serviceOrder->display_message = "Purchased product: " . $product->product_name
                                                . " successfully.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Purchased product with id: " . $product->id 
                                                    . "successfully.";
            $transactionLog->save();

            return $product;

        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to purchase product with id: " . $product->id 
                                                    . " and name: " . $product->product_name
                                                    . ". Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();
            $serviceOrder->save();

            throw new EditProductException($e);
        } catch(Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to purchase product with id: " . $product->id 
                                                    . " and name: " . $product->product_name
                                                    . ". Excpetion: " .$e->getMessage(). ".";
            $transactionLog->save();
            $serviceOrder->save();

            throw new EditProductException($e);
        }

    }
        
}
?>