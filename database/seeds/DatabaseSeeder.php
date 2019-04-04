<?php

use Illuminate\Database\Seeder;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('maklad.permission.cache');
        
        // create permissions
        Permission::firstOrCreate(['name' => 'informasi']);

        Permission::firstOrCreate(['name' => 'karyawan']);

        Permission::firstOrCreate(['name' => 'kategori']);

        Permission::firstOrCreate(['name' => 'unit']);

        Permission::firstOrCreate(['name' => 'ppn']);
        
        Permission::firstOrCreate(['name' => 'barang']);
        
         Permission::firstOrCreate(['name' => 'pos']);         
        
        // create roles and assign existing permissions
        $role = Role::firstOrCreate(['name' => 'kasir']);
        $role->givePermissionTo('pos');

        
       /* $role = Role::firstOrCreate(['name' => 'admin-barang']);
        $role->givePermissionTo('kategori');
        $role->givePermissionTo('unit');
        $role->givePermissionTo('ppn');
        $role->givePermissionTo('barang');*/


        $role = Role::firstOrCreate(['name' => 'admin']);
       $role->givePermissionTo('informasi');
       $role->givePermissionTo('karyawan');
       $role->givePermissionTo('kategori');
       $role->givePermissionTo('unit');
       $role->givePermissionTo('ppn');
       $role->givePermissionTo('barang');
       $role->givePermissionTo('pos');
    }
}
