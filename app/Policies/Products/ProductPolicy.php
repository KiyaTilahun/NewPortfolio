<?php

namespace App\Policies\Products;

use App\Models\Products\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasAnyRole(['Super Admin'])||$user->hasPermissionTo('view product');


    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        //
       return  $user->hasPermissionTo('view product');
       

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
       return  $user->hasPermissionTo('create product');
       

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        //
       return  $user->hasPermissionTo('update product');
       

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        //
       return  $user->hasPermissionTo('delete product');
       

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        //
       return  $user->hasPermissionTo('restore product');
       

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        //
       return  $user->hasPermissionTo('forceDelete product');
       

    }
}
