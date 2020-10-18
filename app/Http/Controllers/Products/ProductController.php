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

class ProductController extends Controller
{
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
                // ->with('i', (request()->input('page', 1) - 1) * 5);              
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
        try {
            $productActivator = new ProductActivator();
            $productActivator->addProduct($request);

            auth()->user()->notify(new ProductCreated());

            return redirect()->route('products.index')->with('success','Product created successfully');
        } catch (CreateProductException $e) {
            // add logic to handle create product exception here
        } catch (Exception $e) {
            // add logic to handle any other exception here
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
