<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Models\Products\Product;
use App\Models\Products\ProductImages;
use App\Models\Products\Repository\ProductRepository;
use App\Modules\Products\ProductActivator;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProductDetails;
use App\Models\Categories\Categories;

// Exception Imports
use App\Exception;
use App\Exceptions\CreateProductException;
use App\Exceptions\FetchProductException;

// Notification Imports
use App\Notifications\ProductCreatedSuccessfully;
use App\Notifications\ProductUpdatedSuccessfully;
use App\Notifications\ProductUpdatedFailed;

// Log Imports
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
        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'fetch-index-product';
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
            return view('products.index', 
                            [
                                'notifications' => $notifications,
                                'serviceOrder' => $serviceOrder
                            ]
                        ); 

        } catch(FetchProductException $e) {
            
            $serviceOrder->display_message = 'Index Process (GET) Failed. Error: ' . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = 'Index Process (GET) Failed. Error: ' . $e->message();

            $serviceOrder->save();

            // put failure view here

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
        $serviceOrder->process = 'fetch-create-product';
        $serviceOrder->display_message = 'Create Process (GET) Started.';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;

        $serviceOrder->save();

        try {

            $serviceOrder->display_message = 'Create Process (GET) Successful.';
            $serviceOrder->process_status = 30;
            $serviceOrder->transaction_status = 30;
            $serviceOrder->response_message = 'Create Process (GET) Successful.';
            $serviceOrder->save();

            $categories = Categories::all();
            return view('products/create', ['categories' => $categories]);

        } catch (Exception $e) {

            $serviceOrder->display_message = 'Create Process (GET) Failed. Error: ' . $e->message();
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = 'Create Process (GET) Failed. Error: ' . $e->message();

            $serviceOrder->save();

            // put failure view here

        }

    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {

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
            $product = $productActivator->addProduct($request, $serviceOrder);

            auth()
                ->user()
                ->notify(
                    new ProductCreatedSuccessfully(
                        Crypt::encryptString($product->id),
                        $product->product_name,
                        $product->quantity,
                        $product->unit
                    )
                );

            return redirect()->route('products.index');
        } catch (CreateProductException $e) {

            $serviceOrder->display_message = "Unable to create product '" . $request->product_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to create product '" 
                                                . $request->product_name . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();
        } catch (Exception $e) {

            $serviceOrder->display_message = "Unable to create product '" . $request->product_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to create product '" 
                                                . $request->product_name . "'. 
                                                Error: " . $e->getMessage();
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

        $id = Crypt::decryptString($id);

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'show-product';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->display_message = 'Show Product Process Initiated';
        $serviceOrder->save();

        try {

            $productActivator = new ProductActivator();
            $product = $productActivator->returnProductById($id, $serviceOrder);
            return view('products.show',['product' => $product, 
                'loc' => 'storage/photos/products/thumbnails/']);

        } catch (FetchProductException $e) {

            $serviceOrder->display_message = "Unable to show product. Contact admin for assistance.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to show product with id: '" 
                                                . $id . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            return redirect()->route('products.index');

        } catch (Exception $e) {

            $serviceOrder->display_message = "Unable to show product. Contact admin for assistance.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to show product with id: '" 
                                                . $id . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            return redirect()->route('products.index');

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
        
        $id = Crypt::decryptString($id);

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'fetch-product-edit';
        $serviceOrder->process_status = 0;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 0;
        $serviceOrder->display_message = 'Fetch Product (Edit) Process Initiated';
        $serviceOrder->save();

        try {
            $productActivator = new ProductActivator(new Product());
            $product = $productActivator->returnProductById($id, $serviceOrder);
            $categories = Categories::all();

            return view('products.edit', ['product' => $product, 
                'categories' => $categories,
                'loc' => 'storage/photos/products/thumbnails/']);
        } catch (Exception $e) {

            $serviceOrder->display_message = "Unable to edit product. Contact admin for assistance.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to edit product with id: '" 
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
    public function update(UpdateProductDetails $request, $id)
    {

        $id = Crypt::decryptString($id);

        $serviceOrder = new ServiceOrder();
        $serviceOrder->process = 'update-product';
        $serviceOrder->process_status = 1;
        $serviceOrder->user_id = auth()->user()->id;
        $serviceOrder->user_email = auth()->user()->email;
        $serviceOrder->to_display = 1;
        $serviceOrder->display_message = 'Update Product Process Initiated';
        $serviceOrder->save();

        try {
            $productActivator = new ProductActivator();
            $product = $productActivator->editProduct($request, $id, $serviceOrder);

            if (!$request->has('photos')) {

                $serviceOrder->process_status = 30;
                $serviceOrder->transaction_status = 30;
                $serviceOrder->response_message = "Updated product successfully. No images to upload.";
                $serviceOrder->display_message = "Updated product successfully. No images to upload.";
                $serviceOrder->save();
                
            }

            auth()
                ->user()
                ->notify(
                    new ProductUpdatedSuccessfully(
                        Crypt::encryptString($product->id),
                        $product->product_name,
                        $product->quantity,
                        $product->unit
                    )
                );

            return redirect()->route('products.index');
        } catch (Exception $e) {

            $serviceOrder->display_message = "Unable to update product (NB: Name could be updated)'" 
                                                . $request->product_name . "'.";
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = "Unable to update product (NB: Name could be updated)'" 
                                                . $request->product_name . "'. 
                                                Error: " . $e->getMessage();
            $serviceOrder->save();

            auth()
                ->user()
                ->notify(new ProductUpdateFailed($request->product_name));

            return redirect()->route('products.index');
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
        $id = Crypt::decryptString($id);
    }
}
