<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Products\ProductActivator;
use App\Models\Products\Product;
class DashboardController extends Controller
{
    //

    function __construct() 
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete|order-create|order-list|order-edit|order-delete'
                            , ['only' => ['getDashboard']]);
    }

    public function getDashboard() {
        try {
            $productActivator = new ProductActivator();

            if (auth()->user()->hasRole('Seller')) {
                $totalProducts = $productActivator->returnAllUserProducts()->paginate();
                $purchasedProducts = 0;
                $nonPurchasedProducts = 0;
                foreach($totalProducts as $product) {
                    if ($product->purchased == false) {
                        $nonPurchasedProducts++;
                    } else {
                        $purchasedProducts++;
                    }
                }
                dump("total products: " . count($totalProducts));
                dump("purchased products: " . $purchasedProducts);
                dump("non-purchased products: " . $nonPurchasedProducts);
            } else if (auth()->user()->hasRole('Buyer')) {
                dd("buyer");
            } else {
                dump("Role not in checks. Shld be admin otherwise we been hacked!!!");
                dd(auth()->user()->getRoleNames());
            }
        } catch (\Exception $e) {
            // add logic to handle exception here
        }
    }
}
