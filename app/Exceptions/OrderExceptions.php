<?php
namespace App\Exceptions;

use RuntimeException;

// product exceptions
class CreateOrderException extends RuntimeException {}

class DeactivateOrderException extends RuntimeException {}

class EditOrderException extends RuntimeException {}

class FetchOrderException extends RuntimeException {}

class ServiceOrderException extends RuntimeException {}

?>