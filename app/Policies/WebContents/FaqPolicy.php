<?php

namespace App\Policies\WebContents;

use App\Models\User;
use App\Models\WebContents\Faq;
use Illuminate\Auth\Access\Response;

class FaqPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view faq');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Faq $faq): bool
    {
        //
       return  $user->hasPermissionTo('view faq');
       

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
       return  $user->hasPermissionTo('create faq');
       

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Faq $faq): bool
    {
        //
       return  $user->hasPermissionTo('update faq');
       

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Faq $faq): bool
    {
        //
       return  $user->hasPermissionTo('delete faq');
       

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Faq $faq): bool
    {
        //
       return  $user->hasPermissionTo('restore faq');
       

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Faq $faq): bool
    {
        //
       return  $user->hasPermissionTo('forceDelete faq');
       

    }
}
