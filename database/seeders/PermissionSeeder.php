<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'dashboard-total-enquiry', // done
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'dashboard-permintaan-masuk', // done
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'dashboard-penawaran-terkirim', //  done
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'dashboard-follow-up', // done
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'dashboard-cancel', //  done
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'dashboard-deal', //  done
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'dashboard-enquiry-chart', // done
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'enquiry-create',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'enquiry-read',
            'guard_name' => 'web'
        ]);
        Permission::create([ //  done
            'name' => 'enquiry-update',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'item-create',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'item-update',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'brand-create',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'brand-update',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'report-enquirer',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'report-item',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'report-wishlist',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'report-share-product',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-general',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-enquirer-create',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-enquirer-update',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-staff-create',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-staff-read',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-staff-update',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-role-create',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-role-read',
            'guard_name' => 'web'
        ]);
        Permission::create([// done
            'name' => 'settings-role-update',
            'guard_name' => 'web'
        ]);
        Permission::create([ // done
            'name' => 'settings-about-us-update',
            'guard_name' => 'web'
        ]);
        
        
        
        
    }
}
