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

// Log Imports
use App\Models\ServiceOrder\ServiceOrder;
use App\Models\TransactionLog\TransactionLog;

class OrderRepository
{
    public function __construct(Orders $order) {
        $this->model = $order;
    }
    
    public function createOrder($data, $serviceOrder) {

        
        $transactionLog = new TransactionLog();
        $transactionLog->event = "create-order";
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event_status = 0;
        $transactionLog->response_message = "";
        $transactionLog->save();
        
        
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
                
                
                
            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->order_id = $order->id;
            $serviceOrder->response_message = "Successfully created order with ID: " . $order->id . 
            " and name: " . $order->order_name;
            $serviceOrder->display_message = "Successfully created order : " . $order->order_name;

            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Successfully fetched user orders";
            $transactionLog->save();
        } catch (QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to create order:" . $data->order_name . ". Exception: "
                                                    . $e->getMessage();
            $transactionLog->save();

            throw new CreateOrderException($e);
        } catch (\Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to create order:" . $data->order_name . ". Exception: "
                                                    . $e->getMessage();
            $transactionLog->save();

            throw new CreateOrderException($e);
        } 
    }

    public function fetchOrderById($id, $serviceOrder) {
        
        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch-order";
        $transactionLog->event_status = 0;
        $transactionLog->response_message = "";
        $transactionLog->save();

        try {

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = "Successfully fetched order with ID: " . $id;
            $serviceOrder->display_message = "Successfully fetched order with ID: " . $id;
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Successfully fetched order with ID: " . $id;
            $transactionLog->save();

            return Orders::findOrFail($id);

        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch order with ID:" . $id . ".";
            $transactionLog->save();

            throw new FetchProductException($e);
        }
    }

    public function fetchAllUserOrders($serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch-user-orders";
        $transactionLog->event_status = 0;
        $transactionLog->response_message = "";
        $transactionLog->save();

        try {

            $orders = Orders::
                            where([['buyer_id', auth()->user()->id], ['status', 1]])
                            ->latest();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = $serviceOrder->response_message . " Successfully fetched user orders.";
            $serviceOrder->display_message = "Successfully fetched user orders.";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Successfully fetched user orders";
            $transactionLog->save();

            return $orders;
        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch user orders.";
            $transactionLog->save();

            throw new FetchOrderException($e);
        }
    }

    public function fetchNonServicedOrders($serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "fetch-non-serviced-orders";
        $transactionLog->event_status = 0;
        $transactionLog->response_message = "";
        $transactionLog->save();

        try {

            $nonServicedOrders = Orders::
                                    where([['serviced', FALSE], ['status', 1]])
                                    ->latest();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = $serviceOrder->response_message . " Successfully fetched non-serviced orders";
            $serviceOrder->display_message = "Successfully fetched non-serviced orders";
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Successfully fetched non-serviced orders";
            $transactionLog->save();

            return $nonServicedOrders;

        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to fetch non-serviced orders.";
            $transactionLog->save();

            throw new FetchOrderException($e);
        }
    }

    public function updateOrder($data, $id, $serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "update-user-order";
        $transactionLog->event_status = 0;
        $transactionLog->response_message = "";
        $transactionLog->save();
        
        try {

            $order = $this->fetchOrderById($id, $serviceOrder);
            $order->order_name = $data->order_name;
            $order->quantity = $data->quantity;
            $order->quantity_unit = $data->qty_unit;
            $order->order_category = $data->category;
            $order->order_category_type_id = $data->type;

            $order->save();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = "Successfully updated order with ID: " . $order->id . 
                                                " and name: " . $order->order_name;
            $serviceOrder->display_message = "Successfully updated order : " . $order->order_name;
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Successfully updated order with ID: " . $order->id . 
                                                    " and name: " . $order->order_name;
            $transactionLog->save();

        } catch(QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Could not update order name: " . $data->order_name . 
                                                    ". Error: " . $e->getMessage();
            $transactionLog->save();

            throw new EditProductException($e);
        } catch(Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Could not update order name: " . $data->order_name . 
                                                    ". Error: " . $e->getMessage();
            $transactionLog->save();

            throw new EditProductException($e);
        }

    }

    public function deactivateOrder($id, $serviceOrder) {

        $transactionLog = new TransactionLog();
        $transactionLog->service_order_id = $serviceOrder->id;
        $transactionLog->event = "deactivate-order";
        $transactionLog->event_status = 0;
        $transactionLog->response_message = "";
        $transactionLog->save();

        try {
            $order = $this->fetchOrderById($id, $serviceOrder);
            $order->status = 0;
            $order->save();

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->order_id = $id;
            $serviceOrder->response_message = "Successfully deleted order with ID: " . $id . " and name: " . $order->order_name;
            $serviceOrder->display_message = "Successfully deleted order name: " . $order->order_name;
            $serviceOrder->save();

            $transactionLog->event_status = 30;
            $transactionLog->response_message = "Successfully deleted order with ID: " . $id . " and name: " . $order->order_name;
            $transactionLog->save();

        } catch (QueryException $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to delete order with ID: " . $id . ". Exception: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new DeactivateOrderException($e);
        } catch(Exception $e) {

            $transactionLog->event_status = 25;
            $transactionLog->response_message = "Failed to delete order with ID: " . $id . ". Exception: " .$e->getMessage(). ".";
            $transactionLog->save();

            throw new EditOrderException($e);
        }
    }
        
}
?>