<?php

namespace App\Policies;

use App\Policy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any policies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function view(User $user, Policy $policy)
    {
        //
    }

    /**
     * Determine whether the user can create policies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function update(User $user, Policy $policy)
    {
        //
    }

    /**
     * Determine whether the user can delete the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function delete(User $user, Policy $policy)
    {
        //
    }

    /**
     * Determine whether the user can restore the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function restore(User $user, Policy $policy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function forceDelete(User $user, Policy $policy)
    {
        //
    }
}
