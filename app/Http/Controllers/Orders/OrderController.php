<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrder;
use App\Modules\Orders\OrderActivator;
use App\Exceptions\FetchOrderException;
use App\Notifications\OrderCreated;

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
        try {
            $notifications = auth()->user()->unreadNotifications;
            return view('orders.index', ['notifications' => $notifications]);          
        } catch(FetchOrderException $e) {
            // add logic to handle exception here
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
        try {
            $orderActivator = new OrderActivator();
            $orderActivator->addOrder($request);

            auth()->user()->notify(new OrderCreated());

            return redirect()->route('orders.index');
        } catch (Exception $e) {
            // add logic to handle excpetion here
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
        try {
            $orderActivator = new OrderActivator();
            $order = $orderActivator->returnOrderById($id);
            return view('orders.show',['order' => $order]);
        } catch (FetchOrderException $e) {
            // add logic to handle exception here
        } catch (Exception $e) {

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
        try {
            $orderActivator = new OrderActivator();
            $order = $orderActivator->returnOrderById($id);

            return view('orders.edit', ['order' => $order]);
        } catch (Exception $e) {
            // add logic to handle exception here
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
}
