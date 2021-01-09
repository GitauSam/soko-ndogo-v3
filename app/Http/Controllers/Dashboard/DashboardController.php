<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Products\ProductActivator;
use App\Models\Products\Product;
use App\Modules\Orders\OrderActivator;
use App\Models\Orders\Orders;

// Log Imports
use App\Models\ServiceOrder\ServiceOrder;

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
            
            
            $serviceOrder = new ServiceOrder();
            $serviceOrder->process_status = 0;
            $serviceOrder->user_id = auth()->user()->id;
            $serviceOrder->user_email = auth()->user()->email;
            $serviceOrder->to_display = 0;
            $serviceOrder->process = 'dashboard-fetch-statistics';
            $serviceOrder->display_message = 'Process to fetch dashboard statistics started.';
            $serviceOrder->response_message = 'Process to fetch dashboard statistics started.';

            
            
            $serviceOrder->save();

            if (auth()->user()->hasRole('Seller')) {

                /**
                 * If role == Seller
                 * Get product statistics
                 */

                $serviceOrder->process = 'dashboard-fetch-product-statistics';
                $serviceOrder->display_message = 'Process to fetch dashboard product statistics started.';

                $productActivator = new ProductActivator();
                $totalProducts = $productActivator->returnAllUserProducts($serviceOrder)->paginate();
                $totalProductsCount = count($totalProducts);
                foreach($totalProducts as $product) {
                    if ($product->purchased == false) {
                        $nonPurchasedProductsCount++;
                    } else {
                        $purchasedProductsCount++;
                    }
                }

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

                $serviceOrder->process = 'dashboard-fetch-order-statistics';
                $serviceOrder->display_message = 'Process to fetch dashboard order statistics started.';

                $orderActivator = new OrderActivator();
                $totalOrders = $orderActivator->returnAllUserOrders($serviceOrder)->get();
                $totalOrdersCount = count($totalOrders);
                
                foreach($totalOrders as $order) {
                    if ($order->serviced == false) {
                        $nonServicedOrdersCount++;
                    } else {
                        $servicedOrdersCount++;
                    }
                }

                $serviceOrder->display_message = 'Process to fetch dashboard order statistics successful.';

                return view('dashboard', 
                            ["totalItems" => ["Total Orders" => $totalOrdersCount],
                            "servicedItems" => ["Serviced Orders" => $servicedOrdersCount],
                            "nonServicedItems" => ["Non-Serviced Orders" => $nonServicedOrdersCount]
                            ]);

            } else {

                $serviceOrder->process = 'dashboard-fetch-admin-statistics';
                $serviceOrder->display_message = 'Process to fetch dashboard admin statistics started.';

                $orderActivator = new OrderActivator();
                $totalNonServicedOrders = $orderActivator->returnAllNonServicedOrders($serviceOrder)->get();
                $totalNonServicedOrdersCount = count($totalNonServicedOrders->toArray());

                $productActivator = new ProductActivator();
                $totalNonPurchasedProducts = $productActivator->returnAllNonPurchasedProducts($serviceOrder)->get();
                $totalNonPurchasedProductsCount = count($totalNonPurchasedProducts->toArray());

                $serviceOrder->display_message = 'Process to fetch dashboard admin statistics successful.';

                return view('dashboard-admin', 
                            [
                             "nonServicedProducts" => ["Non-Serviced Products" => $totalNonPurchasedProductsCount],
                             "nonServicedOrders" => ["Non-Serviced Orders" => $totalNonServicedOrdersCount]
                            ]);

            }
        } catch (\Exception $e) {
            // add logic to handle exception here

            $serviceOrder->display_message = 'Process to fetch dashboard statistics failed.';
            $serviceOrder->process_status = 25;
            $serviceOrder->transaction_status = 99;
            $serviceOrder->response_message = $serviceOrder->response_message . 
                                                ' Process to fetch dashboard statistics failed.' .
                                                ' Exception: ' . $e->getMessage();

            $serviceOrder->save();

            return view('dashboard', 
                        ["totalItems" => ["N/A" => 0],
                        "servicedItems" => ["N/A" => 0],
                        "nonServicedItems" => ["N/A" => 0]
                        ]);

        }
    }
}
