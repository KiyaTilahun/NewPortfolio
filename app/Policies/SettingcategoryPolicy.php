<?php

namespace App\Policies;

use App\Models\Settingcategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SettingcategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        // return true;
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view settingcategory');


    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Settingcategory $settingcategory): bool
    {
        //
        return  $user->hasPermissionTo('view settingcategory');
       

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return  $user->hasPermissionTo('create settingcategory');
       

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Settingcategory $settingcategory): bool
    {
        //
        return  $user->hasPermissionTo('update settingcategory');
       

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Settingcategory $settingcategory): bool
    {
        //
        return  $user->hasPermissionTo('delete settingcategory');
       

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Settingcategory $settingcategory): bool
    {
        //
        return  $user->hasPermissionTo('restore settingcategory');
       

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Settingcategory $settingcategory): bool
    {
        //
        return  $user->hasPermissionTo('forceDelete settingcategory');
       

    }
}
