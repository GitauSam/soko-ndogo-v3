<?php
namespace App\Exceptions;

use RuntimeException;

// role exceptions
class CreateRoleException extends RuntimeException {}

class RoleNotFoundException extends RuntimeException {}

class RoleUpdateUnsuccessfulException extends RuntimeException {}

class UnableToAssignRoleException  extends RuntimeException {}

class FetchRolesException extends RuntimeException {}

?>