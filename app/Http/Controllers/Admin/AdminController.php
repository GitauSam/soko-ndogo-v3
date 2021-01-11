<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Order Activator Imports
use App\Modules\Orders\OrderActivator;

// Product Activator Imports
use App\Modules\Products\ProductActivator;

// Log Imports
use App\Models\ServiceOrder\ServiceOrder;

// Exceptions
use App\Exceptions\FetchOrderException;
use App\Exceptions\FetchProductException;

// Notifications
use App\Notifications\ProductPurchasedSuccessfully;
use App\Notifications\ProductPurchaseFailed;
use App\Notifications\OrderServicedSuccessfully;
use App\Notifications\OrderServiceFailed;

class AdminController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete|order-create|order-list|order-edit|order-delete'
                            , ['only' => ['getDashboard']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function indexNonPurchasedProducts() {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->process = 'dashboard-fetch-non-purchased-products';
        $serviceOrder->display_message = 'Process to fetch non-purchased products started.';
        $serviceOrder->response_message = 'Process to fetch non-purchased products started.';

        try {

            $serviceOrder->display_message = 'Process to fetch non-purchased products passed to LW component.';
            $serviceOrder->process_status = 2;
            $serviceOrder->transaction_status = 2;
            $serviceOrder->response_message = $serviceOrder->response_message . 
                                                ' Process to fetch non-purchased products passed to LW component.';

            $serviceOrder->save();

            $notifications = auth()->user()->unreadNotifications;

            return view('admin.non-purchased-products', 
                        ['notifications' => $notifications,
                            'serviceOrder' => $serviceOrder]);

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = 'Index non-purchased products (GET) failed. Error: ' . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message . ' Index non-purchased products (GET) failed. Error: ' . $e->message();

            $serviceOrder->save();

            /**
             * 
             * Put explicit failure view here as rest of logic is handled in livewire component.
             * 
             * */ 

        }

    }

    public function getPurchasedProduct($id) {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->process = 'fetch-product-to-purchase';
        $serviceOrder->display_message = 'Process to fetch non-purchased product with ID: ' . 
                                            $id . ' started.';
        $serviceOrder->response_message = 'Process to fetch non-purchased product with ID: ' . 
                                            $id . ' started.';

        $serviceOrder->save();

        try {

            $productActivator = new ProductActivator();
            $product = $productActivator->returnProductById($id, $serviceOrder);
            $nonPurchasedProducts = $productActivator
                                        ->returnAllPurchasedProductsByCategory($product->category_id, $serviceOrder)
                                        ->get();

            $amtInStock = 0;
            $units = [];

            foreach($nonPurchasedProducts as $nonPurchasedProduct) {

                $amtInStock += $nonPurchasedProduct->quantity;

                if (!in_array($nonPurchasedProduct->unit, $units)) {
                    array_push($units, $nonPurchasedProduct->unit);
                }

            }

            return view('admin.purchase-product',
                            ['product' => $product, 
                                'loc' => 'storage/photos/products/thumbnails/',
                                'amtInStock' => $amtInStock,
                                'units' => $units]);

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = 'Fetch non-purchased product (GET) failed. Error: ' 
                                                . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message . ' Fetch non-purchased product (GET) failed. Error: ' 
                                                . $e->message();

            $serviceOrder->save();

            return redirect()->route('non-purchased-products');

        }

    }

    public function purchaseProduct($id) {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->process = 'fetch-product-to-purchase';
        $serviceOrder->display_message = 'Process to purchase product with ID: ' . 
                                            $id . ' started.';
        $serviceOrder->response_message = 'Process to purchase product with ID: ' . 
                                            $id . ' started.';

        $serviceOrder->save();

        try {

            $productActivator = new ProductActivator();
            $product = $productActivator->returnProductById($id, $serviceOrder);
            $product = $productActivator->purchaseProduct($product, $serviceOrder);

            auth()->user()->notify(new ProductPurchasedSuccessfully());

            return redirect()->route('dashboard');

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = "Process to purchase product with id: " . $id
                                                ."failed. Error: " 
                                                . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message 
                                                . " Process to purchase product with id: " . $id
                                                ." failed. Error: " 
                                                . $e->message();

            $serviceOrder->save();

            auth()->user()->notify(new ProductPurchaseFailed());

            return redirect()->route('non-purchased-products');

        }

    }

    public function purchasedProducts() {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->process = 'fetch-all-purchased-products';
        $serviceOrder->display_message = 'Process to fetch all purchased products started.';
        $serviceOrder->response_message = 'Process to fetch all purchased products started.';

        $serviceOrder->save();

        try {

            $productActivator = new ProductActivator();
            $products = $productActivator
                            ->returnAllPurchasedProducts($serviceOrder)
                            ->paginate(5);

            return view('admin.purchased-products', 
                            ['products' => $products]);

        } catch (FetchProductException $e) {
            
            $serviceOrder->display_message = "Process to fetch all purchased products failed. Error: " 
                                                . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message 
                                                . " Process to fetch all purchased products failed. Error: " 
                                                . $e->message();

            $serviceOrder->save();

            return redirect()->route('dashboard');

        }

    }

    public function indexNonServicedOrders() {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->process = 'dashboard-fetch-non-serviced-orders';
        $serviceOrder->display_message = 'Process to fetch non-serviced orders started.';
        $serviceOrder->response_message = 'Process to fetch non-serviced orders started.';

        try {

            $serviceOrder->display_message = 'Process to fetch non-serviced orders passed to LW component.';
            $serviceOrder->process_status = 2;
            $serviceOrder->transaction_status = 2;
            $serviceOrder->response_message = $serviceOrder->response_message . 
                                                ' Process to fetch non-serviced orders passed to LW component.';

            $serviceOrder->save();

            $notifications = auth()->user()->unreadNotifications;

            return view('admin.non-serviced-orders', 
                        ['notifications' => $notifications,
                            'serviceOrder' => $serviceOrder]);

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = 'Index non-serviced orders (GET) failed. Error: ' . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message . 
                                                ' Index non-serviced products (GET) failed. Error: ' . $e->message();

            $serviceOrder->save();

            /**
             * 
             * Put explicit failure view here as rest of logic is handled in livewire component.
             * 
             * */ 

        }

    }

    public function serviceOrder($id) {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->process = 'order-service';
        $serviceOrder->display_message = 'Process to service order with ID: ' . 
                                            $id . ' started.';
        $serviceOrder->response_message = 'Process to service order with ID: ' . 
                                            $id . ' started.';

        $serviceOrder->save();

        try {

            $orderActivator = new OrderActivator();
            $order = $orderActivator->returnOrderById($id, $serviceOrder);
            $order = $orderActivator->serviceOrder($order, $serviceOrder);

            auth()->user()->notify(new OrderServicedSuccessfully());

            return redirect()->route('dashboard');

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = "Process to service order with id: " . $id
                                                ."failed. Error: " 
                                                . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message 
                                                . " Process to service order with id: " . $id
                                                ." failed. Error: " 
                                                . $e->message();

            $serviceOrder->save();

            auth()->user()->notify(new OrderServiceFailed());

            return redirect()->route('non-serviced-orders');

        }

    }

    public function getServiceOrder($id) {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->process = 'fetch-order-to-service';
        $serviceOrder->display_message = 'Process to fetch non-serviced order with ID: ' . 
                                            $id . ' started.';
        $serviceOrder->response_message = 'Process to fetch non-serviced order with ID: ' . 
                                            $id . ' started.';

        $serviceOrder->save();

        try {

            $orderActivator = new OrderActivator();
            $order = $orderActivator->returnOrderById($id, $serviceOrder);
            
            $productActivator = new ProductActivator();
            $purchasedProducts = $productActivator
                                        ->returnAllPurchasedProductsByCategory($order->order_category, $serviceOrder)
                                        ->get();

            $amtInStock = 0;
            $units = [];

            foreach($purchasedProducts as $purchasedProduct) {

                $amtInStock += $purchasedProduct->quantity;

                if (!in_array($purchasedProduct->unit, $units)) {
                    array_push($units, $purchasedProduct->unit);
                }

            }

            return view('admin.service-order',
                            ['order' => $order, 
                                'amtInStock' => $amtInStock,
                                'units' => $units]);

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = 'Fetch non-serviced order (GET) failed. Error: ' 
                                                . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message . ' Fetch non-serviced order (GET) failed. Error: ' 
                                                . $e->message();

            $serviceOrder->save();

            auth()->user()->notify(new OrderServiceFailed());

            return redirect()->route('non-serviced-orders');

        }

    }

    public function servicedOrders() {

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->process = 'fetch-all-serviced-order';
        $serviceOrder->display_message = 'Process fetch all serviced orders started.';
        $serviceOrder->response_message = 'Process fetch all serviced orders started.';

        $serviceOrder->save();

        try {

            $orderActivator = new OrderActivator();
            $orders = $orderActivator
                            ->returnAllServicedOrders($serviceOrder)
                            ->paginate(5);

            return view('admin.serviced-orders', 
                            ['orders' => $orders]);

        } catch (FetchOrderException $e) {
            
            $serviceOrder->display_message = "Process to fetch all serviced orders failed. Error: " 
                                                . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message 
                                                . " Process to fetch all serviced orders failed. Error: " 
                                                . $e->message();

            $serviceOrder->save();

            return redirect()->route('dashboard');

        }

    }

}
