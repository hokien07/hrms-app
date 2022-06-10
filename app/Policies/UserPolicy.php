<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    private $name = 'user.';

    /**
     * Determine if the given user target can be view by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $target
     * @return bool
     */
    public function read(User $user, User $target)
    {
        return $user->hasAbility($this->name.'read') || ($user->id == $target->id && $user->hasAbility('profile.read'));
    }

    /**
     * Determine if the given user target can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $target
     * @return bool
     */
    public function update(User $user, User $target)
    {
        return $user->hasAbility($this->name.'update') || ($user->id == $target->id && $user->hasAbility('profile.update'));
    }

    /**
     * Determine if the given user target can be delete by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $target
     * @return bool
     */
    public function delete(User $user, User $target)
    {
        return $user->hasAbility($this->name.'delete') && $user->id !== $target->id;
    }
}
