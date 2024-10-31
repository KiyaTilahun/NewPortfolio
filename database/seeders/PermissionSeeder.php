<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $permissions = [
            'view post', 'create post', 'update post', 'delete post', 'restore post', 'forceDelete post',
            'view category', 'create category', 'update category', 'delete category', 'restore category', 'forceDelete category',
            'view footerlink', 'create footerlink', 'update footerlink', 'delete footerlink', 'restore footerlink', 'forceDelete footerlink',
            'view media category', 'create media category', 'update media category', 'delete media category', 'restore media category', 'forceDelete media category',
            'view media item', 'create media item', 'update media item', 'delete media item', 'restore media item', 'forceDelete media item',
            'view media type', 'create media type', 'update media type', 'delete media type', 'restore media type', 'forceDelete media type',
            'view socialmedia', 'create socialmedia', 'update socialmedia', 'delete socialmedia', 'restore socialmedia', 'forceDelete socialmedia',
            'view menu', 'create menu', 'update menu', 'delete menu', 'restore menu', 'forceDelete menu',
            'view menuitem', 'create menuitem', 'update menuitem', 'delete menuitem', 'restore menuitem', 'forceDelete menuitem',
            'view product', 'create product', 'update product', 'delete product', 'restore product', 'forceDelete product',
            'view type', 'create type', 'update type', 'delete type', 'restore type', 'forceDelete type',
            'view faq', 'create faq', 'update faq', 'delete faq', 'restore faq', 'forceDelete faq',
            'view page', 'create page', 'update page', 'delete page', 'restore page', 'forceDelete page',
            'view site feature', 'create site feature', 'update site feature', 'delete site feature', 'restore site feature', 'forceDelete site feature',
            'view setting', 'create setting', 'update setting', 'delete setting', 'restore setting', 'forceDelete setting',
            'view settingcategory', 'create settingcategory', 'update settingcategory', 'delete settingcategory', 'restore settingcategory', 'forceDelete settingcategory',
            'view forms', 'create forms', 'update forms', 'delete forms', 'restore forms', 'forceDelete forms',
            'get notification'
            
        ];
   
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);
        
     
        foreach ($permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            
            // Assign permissions to both roles
            $superAdminRole->givePermissionTo($perm);
            $editorRole->givePermissionTo($perm);
        }



       
   
    }
}
