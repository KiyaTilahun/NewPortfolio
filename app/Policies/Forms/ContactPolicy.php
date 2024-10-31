<?php

namespace App\Policies\Forms;

use App\Models\Forms\Contact;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view forms');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contact $contact): bool
    {
        //
        return  $user->hasPermissionTo('view forms');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
       return  $user->hasPermissionTo('create forms');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contact $contact): bool
    {
        //
       return  $user->hasPermissionTo('update forms');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contact $contact): bool
    {
        //
       return  $user->hasPermissionTo('delete forms');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contact $contact): bool
    {
        //
       return  $user->hasPermissionTo('restore forms');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contact $contact): bool
    {
        //
       return  $user->hasPermissionTo('forceDelete forms');

    }
}
