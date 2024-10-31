<?php

namespace App\Policies\WebContents;

use App\Models\User;
use App\Models\WebContents\SiteFeature;
use Illuminate\Auth\Access\Response;

class SiteFeaturePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view site feature');


    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SiteFeature $siteFeature): bool
    {
        //
        return  $user->hasPermissionTo('view site feature');
       

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return  $user->hasPermissionTo('create site feature');
       

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SiteFeature $siteFeature): bool
    {
        return  $user->hasPermissionTo('update site feature');
       

        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SiteFeature $siteFeature): bool
    {
        //
        return  $user->hasPermissionTo('delete site feature');
       

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SiteFeature $siteFeature): bool
    {
        //
        return  $user->hasPermissionTo('restore site feature');
       

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SiteFeature $siteFeature): bool
    {
        //
        return  $user->hasPermissionTo('forceDelete site feature');
       

    }
}
