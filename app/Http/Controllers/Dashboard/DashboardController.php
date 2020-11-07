<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Products\ProductActivator;
use App\Models\Products\Product;
use App\Modules\Orders\OrderActivator;
use App\Models\Orders\Orders;

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
            
            /**
             * Declare variables to hold count of items to be displayed on dashboard
             * depending on user type
             */
            $totalProductsCount = 0;
            $purchasedProductsCount = 0;
            $nonPurchasedProductsCount = 0;

            $totalOrdersCount = 0;
            $servicedOrdersCount = 0;
            $nonServicedOrdersCount = 0;

            if (auth()->user()->hasRole('Seller')) {
                /**
                 * If role == Seller
                 * Get product statistics
                 */
                $productActivator = new ProductActivator();
                $totalProducts = $productActivator->returnAllUserProducts()->paginate();
                $totalProductsCount = count($totalProducts);
                foreach($totalProducts as $product) {
                    if ($product->purchased == false) {
                        $nonPurchasedProductsCount++;
                    } else {
                        $purchasedProductsCount++;
                    }
                }

                // dump("total products: " . count($totalProductsCount));
                // dump("purchased products: " . $purchasedProductsCount);
                // dump("non-purchased products: " . $nonPurchasedProductsCount);

                return view('dashboard', 
                            ["totalItems" => ["Total Products" => $totalProductsCount],
                            "servicedItems" => ["Sold Products" => $purchasedProductsCount],
                            "nonServicedItems" => ["Non-Serviced Products" => $nonPurchasedProductsCount]
                            ]);
            } else if (auth()->user()->hasRole('Buyer')) {
                /**
                 * If role == Buyer
                 * Get order statistics
                 */

                $orderActivator = new OrderActivator();
                $totalOrders = $orderActivator->returnAllUserOrders()->get();
                $totalOrdersCount = count($totalOrders);
                
                foreach($totalOrders as $order) {
                    if ($order->serviced == false) {
                        $nonServicedOrdersCount++;
                    } else {
                        $servicedOrdersCount++;
                    }
                }

                // dump("servicedOrdersCount " . $servicedOrdersCount);
                // dump("nonServicedOrdersCount" . $nonServicedOrdersCount);
                // dd("totalOrdersCount " . $totalOrdersCount);

                return view('dashboard', 
                            ["totalItems" => ["Total Orders" => $totalOrdersCount],
                            "servicedItems" => ["Serviced Orders" => $servicedOrdersCount],
                            "nonServicedItems" => ["Non-Serviced Orders" => $nonServicedOrdersCount]
                            ]);

            } else {
                dump("Role not in checks. Shld be admin otherwise we been hacked!!!");
                dd(auth()->user()->getRoleNames());
            }
        } catch (\Exception $e) {
            // add logic to handle exception here
        }
    }
}
