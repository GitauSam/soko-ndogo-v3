<?php

namespace App\Models\Orders\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\Orders\Orders;
use App\Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\CreateOrderException;
use App\Exceptions\FetchOrderException;
use App\Exceptions\DeactivateOrderException;
use App\Exceptions\EditOrderException;

class OrderRepository
{
    public function __construct(Orders $order) {
        $this->model = $order;
    }
    
    public function createOrder($data) {
        try {
            $order = $this->model->create(
                            array(
                                'buyer_id' => Auth::id(),
                                'order_name' => $data->order_name,
                                'order_category' => $data->category,
                                'quantity' => $data->quantity,
                                'quantity_unit' => $data->qty_unit,
                                'order_category_type_id' => $data->type,
                                'status' => 1,
                                'serviced' =>FALSE,
                                'remainder' =>'100%'
                            )
                        );
        } catch (QueryException $e) {
            throw new CreateOrderException($e);
        } 
    }

    public function fetchOrderById($id) {
        try {
            return Orders::findOrFail($id);
        } catch(QueryException $e) {
            throw new FetchProductException($e);
        }
    }

    public function fetchAllUserOrders() {
        try {
            return Orders::
                where([['buyer_id', auth()->user()->id], ['status', 1]])
                ->latest();
        } catch(QueryException $e) {
            throw new FetchOrderException($e);
        }
    }

    public function updateOrder($data, $id) {
        // try {
        //     $product = $this->fetchProductById($id);
        //     $product->product_name = $data->product_name;
        //     $product->quantity = $data->quantity;
        //     $product->unit = $data->qty_unit;
        //     $product->price = $data->price;
        //     $product->category = $data->category;

        //     $product->save();

        //     $productImagesActivator = new ProductImagesActivator(new ProductImages());

        //     foreach($data->photos as $photo) {
        //         $productImagesActivator->addProductImage($product->id, $photo);
        //     }

        // } catch(QueryException $e) {
        //     throw new EditProductException($e);
        // } catch(Exception $e) {
        //     throw new EditProductException($e);
        // }
    }

    public function deactivateOrder($id) {
        try {
            $order = $this->fetchProductById($id);
            $order->status = 0;
            $order->save();
        } catch (QueryException $e) {
            throw new DeactivateOrderException($e);
        } catch(Exception $e) {
            throw new EditOrderException($e);
        }
    }
        
}
?>