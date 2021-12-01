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

		// create SuperUser permissions
		Permission::create(['name' => 'SuperUser-list']);
		Permission::create(['name' => 'SuperUser-create']);
		Permission::create(['name' => 'SuperUser-edit']);
		Permission::create(['name' => 'SuperUser-upload']);
		Permission::create(['name' => 'SuperUser-download']);
		Permission::create(['name' => 'SuperUser-export']);
		Permission::create(['name' => 'SuperUser-show-deleted']);
		Permission::create(['name' => 'SuperUser-restore']);
		Permission::create(['name' => 'SuperUser-delete']);
		Permission::create(['name' => 'SuperUser-perm-delete']);
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
		
		// create ActionOfficer permissions
		Permission::create(['name' => 'ActionOfficer-list']);
		Permission::create(['name' => 'ActionOfficer-create']);
		Permission::create(['name' => 'ActionOfficer-edit']);
		Permission::create(['name' => 'ActionOfficer-upload']);
		Permission::create(['name' => 'ActionOfficer-download']);
		Permission::create(['name' => 'ActionOfficer-export']);
		Permission::create(['name' => 'ActionOfficer-show-deleted']);
		Permission::create(['name' => 'ActionOfficer-restore']);
		Permission::create(['name' => 'ActionOfficer-delete']);
		Permission::create(['name' => 'ActionOfficer-perm-delete']);
		// create RMU permissions
		
		Permission::create(['name' => 'RMU-list']);
		Permission::create(['name' => 'RMU-create']);
		Permission::create(['name' => 'RMU-edit']);
		Permission::create(['name' => 'RMU-upload']);
		Permission::create(['name' => 'RMU-download']);
		Permission::create(['name' => 'RMU-export']);
		Permission::create(['name' => 'RMU-show-deleted']);
		Permission::create(['name' => 'RMU-restore']);
		Permission::create(['name' => 'RMU-delete']);
		Permission::create(['name' => 'RMU-perm-delete']);

		// create roles and assign existing permissions SuperUser
		$role1 = Role::create(['name' => 'SuperUser']);
		$role1->givePermissionTo('SuperUser-list');
		$role1->givePermissionTo('SuperUser-create');
		$role1->givePermissionTo('SuperUser-edit');
		$role1->givePermissionTo('SuperUser-upload');
		$role1->givePermissionTo('SuperUser-download');
		$role1->givePermissionTo('SuperUser-export');
		$role1->givePermissionTo('SuperUser-show-deleted');
		$role1->givePermissionTo('SuperUser-restore');
		$role1->givePermissionTo('SuperUser-delete');
		$role1->givePermissionTo('SuperUser-perm-delete');

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

		// create roles and assign existing permissions SuperAdmin
		$role2 = Role::create(['name' => 'SuperAdmin']);
		$role2->givePermissionTo('SuperAdmin-list');
		$role2->givePermissionTo('SuperAdmin-create');
		$role2->givePermissionTo('SuperAdmin-edit');
		$role2->givePermissionTo('SuperAdmin-upload');
		$role2->givePermissionTo('SuperAdmin-download');
		$role2->givePermissionTo('SuperAdmin-export');
		$role2->givePermissionTo('SuperAdmin-show-deleted');
		$role2->givePermissionTo('SuperAdmin-restore');
		$role2->givePermissionTo('SuperAdmin-delete');
		$role2->givePermissionTo('SuperAdmin-perm-delete');
		
		// create roles and assign existing permissions ActionOfficer
		
		$role5 = Role::create(['name' => 'RMU']);
		$role5->givePermissionTo('RMU-list');
		$role5->givePermissionTo('RMU-create');
		$role5->givePermissionTo('RMU-edit');
		$role5->givePermissionTo('RMU-upload');
		$role5->givePermissionTo('RMU-download');
		$role5->givePermissionTo('RMU-export');
		$role5->givePermissionTo('RMU-show-deleted');
		$role5->givePermissionTo('RMU-restore');
		$role5->givePermissionTo('RMU-delete');
		$role5->givePermissionTo('RMU-perm-delete');
	}
}