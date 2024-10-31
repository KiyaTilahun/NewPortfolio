<?php

namespace App\Policies\Products;

use App\Models\Products\Type;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view type');


    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Type $type): bool
    {
        //
       return  $user->hasPermissionTo('view type');
       

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
       return  $user->hasPermissionTo('create type');
       

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Type $type): bool
    {
        //
       return  $user->hasPermissionTo('update type');
       

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Type $type): bool
    {
        //
       return  $user->hasPermissionTo('delete type');
       

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Type $type): bool
    {
        //
       return  $user->hasPermissionTo('restore type');
       

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Type $type): bool
    {
        //
       return  $user->hasPermissionTo('forceDelete type');
       

    }
}
