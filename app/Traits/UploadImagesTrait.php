<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait UploadImagesTrait {
    function getFullSizeProductImageStorageLocation() {
        return "public/photos/products/fullsize/";
    }

    function getThumbnailProductStorageLocation() {
        return "public/photos/products/thumbnails/";
    }

    function uploadProductImages($image) {
        $storageLocnsArray = [];
        $filenameThumbnail = "thumbnail-"  . time() . "."  . $image->getClientOriginalExtension();
        $filenameFullSize = "fullsize-" . time() . "."  . $image->getClientOriginalExtension();
        $thumbnail_storage_path = "app/" . $this->getThumbnailProductStorageLocation() . $filenameThumbnail;
        $fullsize_storage_path = "app/" . $this->getFullSizeProductImageStorageLocation() . $filenameFullSize;
        $image->storeAs($this->getThumbnailProductStorageLocation(), $filenameThumbnail);
        $image->storeAs($this->getFullSizeProductImageStorageLocation(), $filenameFullSize);
        Image::make(storage_path($thumbnail_storage_path))->resize(400, 300)->save();
        Image::make(storage_path($fullsize_storage_path))->resize(900, 600)->save();

        $storageLocnsArray["thumbnail_storage_path"] = $thumbnail_storage_path;
        $storageLocnsArray["fullsize_storage_path"] = $fullsize_storage_path;
        $storageLocnsArray["saved_thumbnail_name"] = $filenameThumbnail;
        $storageLocnsArray["saved_full_image_name"] = $filenameFullSize;

        return $storageLocnsArray;
    }
}
?>