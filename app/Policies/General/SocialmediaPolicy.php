<?php

namespace App\Policies\General;

use App\Models\General\Socialmedia;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SocialmediaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view socialmedia');

        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Socialmedia $socialmedia): bool
    {
       return  $user->hasPermissionTo('view socialmedia');
       
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return  $user->hasPermissionTo('create socialmedia');
       
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Socialmedia $socialmedia): bool
    {
       return  $user->hasPermissionTo('update socialmedia');
       
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Socialmedia $socialmedia): bool
    {
       return  $user->hasPermissionTo('delete socialmedia');
       
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Socialmedia $socialmedia): bool
    {
       return  $user->hasPermissionTo('restore socialmedia');
       
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Socialmedia $socialmedia): bool
    {
       return  $user->hasPermissionTo('forceDelete socialmedia');
       
        
    }
}
