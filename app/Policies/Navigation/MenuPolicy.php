<?php

namespace App\Policies\Navigation;

use App\Models\Navigation\Menu;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MenuPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view menu');


    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Menu $menu): bool
    {
       return  $user->hasPermissionTo('view menu');
        
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return  $user->hasPermissionTo('create menu');
        
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Menu $menu): bool
    {
      //  return  $user->hasPermissionTo('view menu');
       return  $user->hasPermissionTo('update menu');

        
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Menu $menu): bool
    {
       return  $user->hasPermissionTo('delete menu');
        
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Menu $menu): bool
    {
       return  $user->hasPermissionTo('restore menu');
        
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Menu $menu): bool
    {
       return  $user->hasPermissionTo('forceDelete menu');
        
        
    }
}
