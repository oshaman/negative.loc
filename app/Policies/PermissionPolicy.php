<?php

namespace Oshaman\Publication\Policies;

use Oshaman\Publication\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \Oshaman\Publication\User  $user
     * @param  \Oshaman\Publication\Permission  $permission
     * @return mixed
     */
    public function change(User $user) {
    	//EDIT_PERMISSIONS
		return $user->canDo('ADMIN_USERS');
	}
}
