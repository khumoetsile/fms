<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder {
	/**
	 * Create the initial roles and permissions.
	 *
	 * @return void
	 */
	public function run() {
		// Reset cached roles and permissions
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

		// create SuperAdmin permissions
		Permission::create(['name' => 'SuperAdmin-list']);
		Permission::create(['name' => 'SuperAdmin-create']);
		Permission::create(['name' => 'SuperAdmin-edit']);
		Permission::create(['name' => 'SuperAdmin-upload']);
		Permission::create(['name' => 'SuperAdmin-download']);
		Permission::create(['name' => 'SuperAdmin-export']);
		Permission::create(['name' => 'SuperAdmin-show-deleted']);
		Permission::create(['name' => 'SuperAdmin-restore']);
		Permission::create(['name' => 'SuperAdmin-delete']);
		Permission::create(['name' => 'SuperAdmin-perm-delete']);
		// create Admin permissions
		Permission::create(['name' => 'Admin-list']);
		Permission::create(['name' => 'Admin-create']);
		Permission::create(['name' => 'Admin-edit']);
		Permission::create(['name' => 'Admin-upload']);
		Permission::create(['name' => 'Admin-download']);
		Permission::create(['name' => 'Admin-export']);
		Permission::create(['name' => 'Admin-show-deleted']);
		Permission::create(['name' => 'Admin-restore']);
		Permission::create(['name' => 'Admin-delete']);
		Permission::create(['name' => 'Admin-perm-delete']);
		
		// create Accounts permissions
		Permission::create(['name' => 'Accounts-list']);
		Permission::create(['name' => 'Accounts-create']);
		Permission::create(['name' => 'Accounts-edit']);
		Permission::create(['name' => 'Accounts-upload']);
		Permission::create(['name' => 'Accounts-download']);
		Permission::create(['name' => 'Accounts-export']);
		Permission::create(['name' => 'Accounts-show-deleted']);
		Permission::create(['name' => 'Accounts-restore']);
		Permission::create(['name' => 'Accounts-delete']);
		Permission::create(['name' => 'Accounts-perm-delete']);
		// create Manager permissions
		
		Permission::create(['name' => 'Manager-list']);
		Permission::create(['name' => 'Manager-create']);
		Permission::create(['name' => 'Manager-edit']);
		Permission::create(['name' => 'Manager-upload']);
		Permission::create(['name' => 'Manager-download']);
		Permission::create(['name' => 'Manager-export']);
		Permission::create(['name' => 'Manager-show-deleted']);
		Permission::create(['name' => 'Manager-restore']);
		Permission::create(['name' => 'Manager-delete']);
		Permission::create(['name' => 'Manager-perm-delete']);
		
		// create Customers permissions
		Permission::create(['name' => 'Customer-list']);
		Permission::create(['name' => 'Customer-create']);
		Permission::create(['name' => 'Customer-edit']);
		Permission::create(['name' => 'Customer-upload']);
		Permission::create(['name' => 'Customer-download']);
		Permission::create(['name' => 'Customer-export']);
		Permission::create(['name' => 'Customer-show-deleted']);
		Permission::create(['name' => 'Customer-restore']);
		Permission::create(['name' => 'Customer-delete']);
		Permission::create(['name' => 'Customer-perm-delete']);

		// create roles and assign existing permissions SuperAdmin
		$role1 = Role::create(['name' => 'SuperAdmin']);
		$role1->givePermissionTo('SuperAdmin-list');
		$role1->givePermissionTo('SuperAdmin-create');
		$role1->givePermissionTo('SuperAdmin-edit');
		$role1->givePermissionTo('SuperAdmin-upload');
		$role1->givePermissionTo('SuperAdmin-download');
		$role1->givePermissionTo('SuperAdmin-export');
		$role1->givePermissionTo('SuperAdmin-show-deleted');
		$role1->givePermissionTo('SuperAdmin-restore');
		$role1->givePermissionTo('SuperAdmin-delete');
		$role1->givePermissionTo('SuperAdmin-perm-delete');

		$role1->givePermissionTo('Admin-list');
		$role1->givePermissionTo('Admin-create');
		$role1->givePermissionTo('Admin-edit');
		$role1->givePermissionTo('Admin-upload');
		$role1->givePermissionTo('Admin-download');
		$role1->givePermissionTo('Admin-export');
		$role1->givePermissionTo('Admin-show-deleted');
		$role1->givePermissionTo('Admin-restore');
		$role1->givePermissionTo('Admin-delete');
		$role1->givePermissionTo('Admin-perm-delete');

		// create roles and assign existing permissions Admin
		$role2 = Role::create(['name' => 'Admin']);
		$role2->givePermissionTo('Admin-list');
		$role2->givePermissionTo('Admin-create');
		$role2->givePermissionTo('Admin-edit');
		$role2->givePermissionTo('Admin-upload');
		$role2->givePermissionTo('Admin-download');
		$role2->givePermissionTo('Admin-export');
		$role2->givePermissionTo('Admin-show-deleted');
		$role2->givePermissionTo('Admin-restore');
		$role2->givePermissionTo('Admin-delete');
		$role2->givePermissionTo('Admin-perm-delete');
		
		// create roles and assign existing permissions Accounts
		
		$role5 = Role::create(['name' => 'Manager']);
		$role5->givePermissionTo('Manager-list');
		$role5->givePermissionTo('Manager-create');
		$role5->givePermissionTo('Manager-edit');
		$role5->givePermissionTo('Manager-upload');
		$role5->givePermissionTo('Manager-download');
		$role5->givePermissionTo('Manager-export');
		$role5->givePermissionTo('Manager-show-deleted');
		$role5->givePermissionTo('Manager-restore');
		$role5->givePermissionTo('Manager-delete');
		$role5->givePermissionTo('Manager-perm-delete');
		
		// create roles and assign existing permissions Customers
		$role11 = Role::create(['name' => 'Customer']);
		$role11->givePermissionTo('Customer-list');
		$role11->givePermissionTo('Customer-create');
		$role11->givePermissionTo('Customer-edit');
		$role11->givePermissionTo('Customer-upload');
		$role11->givePermissionTo('Customer-download');
		$role11->givePermissionTo('Customer-export');
		$role11->givePermissionTo('Customer-show-deleted');
		$role11->givePermissionTo('Customer-restore');
		$role11->givePermissionTo('Customer-delete');
		$role11->givePermissionTo('Customer-perm-delete');
	}
}