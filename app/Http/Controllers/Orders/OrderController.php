<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrder;
use App\Modules\Orders\OrderActivator;

// Order Notifications
use App\Notifications\OrderCreated;
use App\Notifications\CreateOrderFailed;
use App\Notifications\UpdateOrderSuccessful;
use App\Notifications\UpdateOrderFailed;

// Order Exceptions
use App\Exception;
use App\Exceptions\FetchOrderException;
use App\Exceptions\CreateOrderException;
use App\Exceptions\EditOrderException;

// Log Imports
use App\Models\ServiceOrder\ServiceOrder;

class OrderController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', 
        ['only' => ['index']]);
        $this->middleware('permission:order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'fetch-index-orders';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->display_message = 'Index Process (GET) Started.';

        $serviceOrder->save();

        try {

            $serviceOrder->display_message = 'Index Process (GET) Successful.';
            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = 'Index Process (GET) Successful.';

            $serviceOrder->save();

            $notifications = auth()->user()->unreadNotifications;
            return view('orders.index', ['notifications' => $notifications]);
                
        } catch(FetchOrderException $e) {
            
            $serviceOrder->display_message = 'Index Process (GET) Failed. Error: ' . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = 'Index Process (GET) Failed. Error: ' . $e->message();

            $serviceOrder->save();

            /**
             * 
             * Put explicit failure view here as rest of logic is handled in livewire component.
             * 
             * */ 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'fetch-create-order';
        $serviceOrder->display_message = 'Create Process (GET) Successful.';
        $serviceOrder->process_status = 30;
        $serviceOrder->transaction_status = 30;
        $serviceOrder->response_message = 'Create Process (GET) Successful.';
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;

        $serviceOrder->save();

        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrder $request)
    {
        
        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'store-new-order';
        $serviceOrder->process_status = 1;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->display_message = 'Saving Order Process Initiated';
        $serviceOrder->save();

        try {

            $orderActivator = new OrderActivator();
            $orderActivator->addOrder($request, $serviceOrder);

            auth()->user()->notify(new OrderCreated());

            return redirect()->route('orders.index');

        } catch (CreateOrderException $e) {

            $serviceOrder->display_message = "Unable to create order '" . $request->order_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to create order '" 
                                                . $request->order_name . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            auth()->user()->notify(new CreateOrderFailed());

            return redirect()->route('orders.index');

        } catch (Exception $e) {
            
            $serviceOrder->display_message = "Unable to create order '" . $request->order_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to create order '" 
                                                . $request->order_name . "'. 
                                                Error: " . $e->message();
            $serviceOrder->save();

            auth()->user()->notify(new CreateOrderFailed());

            return redirect()->route('orders.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'show-order';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->display_message = 'Show Order Process Initiated';
        $serviceOrder->save();

        try {
            $orderActivator = new OrderActivator();
            $order = $orderActivator->returnOrderById($id, $serviceOrder);

            return view('orders.show',['order' => $order]);

        } catch (FetchOrderException $e) {

            $serviceOrder->display_message = "Unable to show order. Contact admin for assistance.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to show order order with id: '" 
                                                . $id . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            return redirect()->route('orders.index');

        } catch (Exception $e) {

            $serviceOrder->display_message = "Unable to show order. Contact admin for assistance.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to show order order with id: '" 
                                                . $id . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            return redirect()->route('orders.index');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'fetch-order-edit';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->display_message = 'Fetch Order (Edit) Process Initiated';
        $serviceOrder->save();

        try {
            $orderActivator = new OrderActivator();
            $order = $orderActivator->returnOrderById($id, $serviceOrder);

            return view('orders.edit', ['order' => $order]);
        } catch (Exception $e) {
            
            $serviceOrder->display_message = "Unable to edit order. Contact admin for assistance.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to edit order with id: '" 
                                                . $id . "'. 
                                                Error: " . $e->getMessage();

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'update-order';
        $serviceOrder->process_status = 1;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->display_message = 'Update Order Process Initiated';
        $serviceOrder->save();

        try {

            $orderActivator = new OrderActivator();
            $orderActivator->editOrder($request, $id, $serviceOrder);

            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = "Updated order successfully.";
            $serviceOrder->display_message = "Updated product successfully.";
            $serviceOrder->save();

            auth()->user()->notify(new UpdateOrderSuccessful());

            return redirect()->route('orders.index');

        } catch (EditOrderException $e) {

            $serviceOrder->display_message = "Unable to update order (NB: Name could be updated)'" 
                                                . $request->order_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to update order (NB: Name could be updated)'" 
                                                . $request->order_name . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            auth()->user()->notify(new UpdateOrderFailed());

            return redirect()->route('orders.index');

        } catch (Exception $e) {

            $serviceOrder->display_message = "Unable to update order (NB: Name could be updated)'" 
                                                . $request->order_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to update order (NB: Name could be updated)'" 
                                                . $request->order_name . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            auth()->user()->notify(new UpdateOrderFailed());

            return redirect()->route('orders.index');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
