<?php

namespace Oshaman\Publication\Policies;

use Oshaman\Publication\User;
use Oshaman\Publication\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \Oshaman\Publication\User  $user
     * @param  \Oshaman\Publication\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $event)
    {
        //
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \Oshaman\Publication\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canDo('ADD_EVENTS');
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \Oshaman\Publication\User  $user
     * @param  \Oshaman\Publication\Event  $event
     * @return mixed
     */
    public function update(User $user, Event $event)
    {
        return $user->canDo('UPDATE_EVENTS');
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \Oshaman\Publication\User  $user
     * @param  \Oshaman\Publication\Event  $event
     * @return mixed
     */
    public function delete(User $user, Event $event)
    {
        //
    }
}
