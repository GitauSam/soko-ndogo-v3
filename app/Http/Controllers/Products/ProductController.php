<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\ProductImages;
use App\Models\Products\Repository\ProductRepository;
use App\Modules\Products\ProductActivator;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProductDetails;
use App\Exception;
use App\Exceptions\CreateProductException;
use App\Exceptions\FetchProductException;
use App\Notifications\ProductCreated;
use App\Models\ServiceOrder\ServiceOrder;

class ProductController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', 
        ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
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
            return view('products.index', ['notifications' => $notifications]);            
        } catch(FetchProductException $e) {
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
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        // process status '1' => start of process
        // process status '2' => process is in progress
        // process status '25' => exception occurred during execution of process
        // transaction status '100' => transaction is incomplete
        // transaction status '99' => exception occurred during execution of process


        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'store-new-product';
        $serviceOrder->process_status = 1;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->display_message = 'Saving Product Process Initiated';
        $serviceOrder->save();

        try {
            $productActivator = new ProductActivator();
            $productActivator->addProduct($request, $serviceOrder);

            auth()->user()->notify(new ProductCreated());

            return redirect()->route('products.index');
        } catch (CreateProductException $e) {
            // add logic to handle create product exception here

            $serviceOrder->display_message = "Unable to create product '" . $request->product_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to create product '" 
                                                . $request->product_name . "'. 
                                                Exception occurred true. 
                                                Message: " . $e->message;
            $serviceOrder->save();
        } catch (Exception $e) {
            // add logic to handle any other exception here

            $serviceOrder->display_message = "Unable to create product '" . $request->product_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to create product '" 
                                                . $request->product_name . "'. 
                                                Exception occurred true. 
                                                Message: " . $e->message;
            $serviceOrder->save();
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
            $productActivator = new ProductActivator();
            $product = $productActivator->returnProductById($id);
            return view('products.show',['product' => $product, 
                'loc' => 'storage/photos/products/thumbnails/']);
        } catch (FetchProductException $e) {
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
            $productActivator = new ProductActivator(new Product());
            $product = $productActivator->returnProductById($id);

            return view('products.edit', ['product' => $product, 
                'loc' => 'storage/photos/products/thumbnails/']);
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
    public function update(UpdateProductDetails $request, $id)
    {
        // dd($request);
        try {
            $productActivator = new ProductActivator();
            $productActivator->editProduct($request, $id);

            return redirect()->route('products.index')->with('success','Product updated successfully');
        } catch (Exception $e) {
            // add logic to handle exception here
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
