<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Log Imports
use App\Models\ServiceOrder\ServiceOrder;

// Exceptions
use App\Exceptions\FetchOrderException;

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
        $serviceOrder->process = 'dashboard-fetch-statistics';
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

            return view('admin.non-serviced-products', 
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
}
