<?php

namespace App\Models\Products\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\Products\ProductImages;
use App\Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\CreateProductException;
use App\Exceptions\CreateProductImageException;
use App\Exceptions\DeactivateProductImageException;
// use App\Exceptions\EditProductImageException;
// use App\Exceptions\FetchProductImagesException;

class ProductImagesRepository 
{
    public function __construct(ProductImages $productImage) {
        $this->model = $productImage;
    }

    public function createProductImage($prodId, $photo, $url, $is_thumbnail, $saved_image_name) {
        try {
            return $this->model->create(array(
                'product_id' => $prodId,
                'user_id' => Auth::id(),
                'status' => 1,
                'image_name' => $photo->getClientOriginalName(),
                'image_url' => $url,
                'is_thumbnail' => $is_thumbnail,
                'saved_image_name' => $saved_image_name
            ));
        } catch (QueryException $e) {
            throw new CreateProductImageException($e);
        }
    }

    public function deactivateProductImage($imgName, $prodId) {
        try {
            $productImages = ProductImages::where('product_id', $prodId)
            ->where('image_name', $imgName)
            ->update(['status' => 0]);
        } catch (QueryException $e) {
            throw new DeactivateProductImageException($e);
        }
    }
}
?>