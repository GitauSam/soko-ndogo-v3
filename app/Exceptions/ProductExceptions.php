<?php
namespace App\Exceptions;

use RuntimeException;

// product exceptions
class CreateProductException extends RuntimeException {}

class FetchProductException extends RuntimeException {}

class EditProductException extends RuntimeException {}

class DeactivateProductException extends RuntimeException {}

class FetchNonPurchasedException extends RuntimeException {}

// product images exceptions
class FetchProductImagesException extends RuntimeException {}

class EditProductImageException extends RuntimeException {}

class CreateProductImageException extends RuntimeException {}

class DeactivateProductImageException extends RuntimeException {}
?>