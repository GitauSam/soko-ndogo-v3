<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;

// Products Imports
use App\Models\Products\Product;
use App\Modules\Products\ProductActivator;

// Product Exception Imports
use App\Exceptions\FetchProductException;

// Log imports
use App\Models\ServiceOrder\ServiceOrder;

//Notification Imports
use App\Notifications\ProductDeletedSuccessfully;

class IndexProducts extends Component
{

    use WithPagination;

    public $serviceOrder;

    public function mount($serviceOrder) 
    {
        $this->serviceOrder = $serviceOrder;
    }

    public function deactivateProduct($id) 
    {

        $id = Crypt::decryptString($id);

        $so = new ServiceOrder();
        $so->process = 'deactivate-product';
        $so->process_status = 0;
        $so->user_id = auth()->user()->id;
        $so->user_email = auth()->user()->email;
        $so->to_display = 1;
        $so->display_message = 'Process to deactivate product started.';
        $so->response_message = 'Process to deactivate product started.';
        
        $so->save();

        try {

            $productActivator = new ProductActivator();
            $product = $productActivator->removeProduct($id, $so);

            auth()
                ->user()
                ->notify(
                    new ProductDeletedSuccessfully(
                        Crypt::encryptString($id),
                        $product->product_name,
                        $product->quantity,
                        $product->unit
                    )
                );

        } catch (DeactivateProductException $e) {
            
            $so->display_message = 'Deactivate product process failed.';
            $so->process_status = 25;
            $so->transaction_status = 99;
            $so->response_message .= 'Deactivate product process failed. Error: ' . $e->message();

            $so->save();

        } catch(EditProductException $e) {
            
            $so->display_message = 'Deactivate product process failed.';
            $so->process_status = 25;
            $so->transaction_status = 99;
            $so->response_message .= 'Deactivate product process failed. Error: ' . $e->message();

            $so->save();

        }

    }

    public function render()
    {
        try {
            $productActivator = new ProductActivator();
            $products = $productActivator
                                ->returnAllUserProducts($this->serviceOrder)
                                ->paginate(5);

            return view('livewire.index-products', ['products' => $products]); 
        } catch(FetchProductException $e) {
            // add logic to handle exception here

            return view('livewire.index-products', ['products' => []]); 
        }
    }
}
