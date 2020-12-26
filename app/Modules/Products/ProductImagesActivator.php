<?php

namespace App\Modules\Products;

use App\Models\Products\ProductImages;
use App\Traits\UploadImagesTrait;
use App\Models\Products\Repository\ProductImagesRepository;

class ProductImagesActivator {

    use UploadImagesTrait;

    public function __construct() {
        $this->model = new ProductImages();
        $this->modelRepository = new ProductImagesRepository($this->model);
    }

    public function addProductImage($prod_id, $photo, $serviceOrder) {
        $imageUrls = $this->uploadProductImages($photo);
        
        foreach ($imageUrls as $type => $url) {
            $is_thumbnail = 0;

            if ($type === "thumbnail_storage_path") {
                $is_thumbnail = 1;
                $saved_image_name = $imageUrls["saved_thumbnail_name"];

                $this->modelRepository->createProductImage($prod_id, $photo, $url, 
                $is_thumbnail, $saved_image_name, $serviceOrder);
            } else if ($type === "fullsize_storage_path") {
                $saved_image_name = $imageUrls["saved_full_image_name"];

                $this->modelRepository->createProductImage($prod_id, $photo, $url, 
                $is_thumbnail, $saved_image_name, $serviceOrder);
            }
        }

        $serviceOrder->process_status = 30;
        $serviceOrder->transaction_status = 30;
        $serviceOrder->response_message = "Saved (Updated) product and images successfully";
        $serviceOrder->display_message = "Saved (Updated) product and images successfully.";
        $serviceOrder->save();
        
    }

    public function deactivateProductImage($imgName, $prod_id) {
        $this->modelRepository->deactivateProductImage($imgName, $prod_id);
    }

}
?>