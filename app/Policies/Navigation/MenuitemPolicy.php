<?php

namespace App\Policies\Navigation;

use App\Models\Navigation\Menuitem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MenuitemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view menuitem');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Menuitem $menuitem): bool
    {
        //
       return  $user->hasPermissionTo('view menuitem');
        

    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
       return  $user->hasPermissionTo('create menuitem');
        

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Menuitem $menuitem): bool
    {
        //
       return  $user->hasPermissionTo('update menuitem');
        

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Menuitem $menuitem): bool
    {
        //
       return  $user->hasPermissionTo('delete menuitem');
        

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Menuitem $menuitem): bool
    {
        //
       return  $user->hasPermissionTo('restore menuitem');
        

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Menuitem $menuitem): bool
    {
        //
       return  $user->hasPermissionTo('forceDelete menuitem');
        

    }
}
