<?php

namespace Oshaman\Publication\Repositories;

use Oshaman\Publication\Role;

class RolesRepository extends Repository {
	
	
	public function __construct(Role $role) {
		$this->model = $role;
	}
	
}

?>