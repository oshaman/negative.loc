<?php

namespace Oshaman\Publication\Policies;

use Oshaman\Publication\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \Oshaman\Publication\User  $user
     * @param  \Oshaman\Publication\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \Oshaman\Publication\User  $user
     * @return mixed
     */
   /*  public function create(User $user)
    {
        return $user->can('EDIT_USERS');
    } */
    
    public function edit(User $user)
    {
        return $user->can('EDIT_USERS');
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \Oshaman\Publication\User  $user
     * @param  \Oshaman\Publication\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        //
    }
}
