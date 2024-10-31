<?php

namespace App\Policies\General;

use App\Models\General\Footerlink;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FooterlinkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view footerlink');

        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Footerlink $footerlink): bool
    {
         return  $user->hasPermissionTo('view footerlink');
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return  $user->hasPermissionTo('create footerlink');
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Footerlink $footerlink): bool
    {
         return  $user->hasPermissionTo('update footerlink');
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Footerlink $footerlink): bool
    {
         return  $user->hasPermissionTo('delete footerlink');
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Footerlink $footerlink): bool
    {
         return  $user->hasPermissionTo('restore footerlink');
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Footerlink $footerlink): bool
    {
         return  $user->hasPermissionTo('forceDelete footerlink');
        
    }
}
