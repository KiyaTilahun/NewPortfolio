<?php

namespace App\Policies\General;

use App\Models\General\MediaItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MediaItemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view media item');

        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MediaItem $mediaItem): bool
    {
       return  $user->hasPermissionTo('view media item');
        
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return  $user->hasPermissionTo('create media item');
        
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MediaItem $mediaItem): bool
    {
       return  $user->hasPermissionTo('update media item');
        
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MediaItem $mediaItem): bool
    {
       return  $user->hasPermissionTo('delete media item');
        
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MediaItem $mediaItem): bool
    {
       return  $user->hasPermissionTo('restore media item');
        
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MediaItem $mediaItem): bool
    {
       return  $user->hasPermissionTo('forceDelete media item');
        
        
    }
}
