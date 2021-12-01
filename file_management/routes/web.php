<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**************************** Route Public ****************************/
//Route::resource('/','HomeController');
Route::resource('/','Auth\LoginController');
//Route::get('/', function () {return view('welcome');});
Route::get('404', function () {return view('errors.404');});
Route::get('500', function () {return view('errors.500');});
Route::get('403', function () {return view('errors.403-full')->name('error.403');});
/**************************** Route Public ****************************/
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth']], function() {
	
	Route::group(['middleware' => ['role:SuperUser']], function() {
		/**************************** Route Roles ****************************/
		Route::resource('roles','Role\RoleController');
		Route::get('/roles_deleted_show','Role\RoleController@show_deleted')->name('roles.show_deleted');
		Route::post('/roles_bulk_delete','Role\RoleController@bulk_delet')->name('roles.bulk_delet');
		Route::post('/roles_get','Role\RoleController@get_Roles')->name('get.roles');
		/**************************** Route Roles ****************************/
		/**************************** Route Users ****************************/
		Route::resource('users','User\UserController');
		Route::get('/deactive_users','User\UserController@deactive_users')->name('users.deactive_users');
		Route::get('/users_deleted_show','User\UserController@show_deleted')->name('users.show_deleted');
		Route::get('/users_restore/{id}','User\UserController@restore_single')->name('users.restore_single');
		Route::get('/users_upload_page','User\UserController@upload_page')->name('users.upload_page');
		Route::post('users_csv_upload','User\UserController@upload_process')->name('users.upload_process');
		Route::get('/users_download_csv','User\UserController@download_sample_csv')->name('users.download_csv');
		Route::get('/users_export_csv','User\UserController@export_users')->name('users.export_csv');
		Route::get('/users_bulk_restore','User\UserController@restore_bulk')->name('users.restore_bulk');
		Route::post('/users_bulk_delete','User\UserController@bulk_delet')->name('users.bulk_delet');
		Route::post('/users_permDelete/{id}','User\UserController@perm_Delete');
		Route::post('/users_check','User\UserController@check_users')->name('check.users');
		Route::post('/users_get','CommonFunctionController@get_Users')->name('get.users');
		Route::get('/users_get_admins','User\UserController@get_AdminUsers')->name('get.users_admins');
		Route::get('/users_get_managers','User\UserController@get_ManagerUsers')->name('get.users_managers');

		/**************************** Route Users ****************************/
	});
	Route::group(['middleware' => ['role:SuperUser|RMU|ActionOfficer|SuperAdmin']], function() {
		/**************************** Route Backup  ****************************/
		Route::get('/backup','Backup\BackupController@create')->name('backup');
		Route::get('/backupdatabase', function () { $exitCode = Artisan::call('backup:run');});
		/**************************** Route Backup  ****************************/
		
		
		/**************************** Route Permission ****************************/

		Route::resource('/permissions','Permission\PermissionController');
		Route::get('/permissions_upload_page','Permission\PermissionController@upload_page')->name('permissions.upload_page');
		Route::post('/permissions_csv_upload','Permission\PermissionController@upload_process')->name('permissions.upload_process');
		Route::get('/permissions_download_csv','Permission\PermissionController@download_sample_csv')->name('permissions.download_csv');
		Route::get('/permissions_export_csv','Permission\PermissionController@export_permissions')->name('permissions.export_csv');
		Route::post('/permissions_bulk_delete','Permission\PermissionController@bulk_delet')->name('permissions.bulk_delet');
		Route::get('/permissions_restore/{id}','Permission\PermissionController@restore_single')->name('permissions.restore_single');
		Route::get('/permissions_bulk_restore','Permission\PermissionController@restore_bulk')->name('permissions.restore_bulk');
		Route::get('/permissions_deleted_show','Permission\PermissionController@show_deleted')->name('permissions.show_deleted');
		Route::post('/permissions_permDelete/{id}','Permission\PermissionController@perm_Delete');
		Route::post('/permissions_bulk_permDelete','Permission\PermissionController@perm_bulk_delet');
		Route::post('/permissions_check','Permission\PermissionController@check_permissions')->name('check.permissions');
		Route::post('/permissions_get','Permission\PermissionController@get_permissions')->name('get.permissions');

		/**************************** Route Permission ****************************/
		/**************************** Route File ****************************/
		Route::resource('/files','File\FileController');
		Route::get('/files_upload_page','File\FileController@upload_page')->name('files.upload_page');
		Route::post('/files_csv_upload','File\FileController@upload_process')->name('files.upload_process');
		Route::get('/files_download_csv','File\FileController@download_sample_csv')->name('files.download_csv');
		Route::get('/files_export_csv','File\FileController@export_files')->name('files.export_csv');
		Route::post('/files_bulk_delete','File\FileController@bulk_delet')->name('files.bulk_delet');
		Route::get('/files_restore/{id}','File\FileController@restore_single')->name('files.restore_single');
		Route::get('/files_bulk_restore','File\FileController@restore_bulk')->name('files.restore_bulk');
		Route::get('/files_deleted_show','File\FileController@show_deleted')->name('files.show_deleted');
		Route::post('/files_permDelete/{id}','File\FileController@perm_Delete');
		Route::post('/files_bulk_permDelete','File\FileController@perm_bulk_delet');
		Route::post('/files_check','File\FileController@check_files')->name('check.files');
		Route::post('/files_get','File\FileController@get_files')->name('get.files');
		Route::post('get_office_users','File\FileController@get_office_users')->name('get.office_users');
		Route::get('forwarded_files','File\FileController@forwarded_files')->name('forwarded.files');
		Route::get('recieved_files','File\FileController@recieved_files')->name('recieved.files');
		Route::get('/fwd/{id}','File\FileController@fwd')->name('fwd.files');
		Route::get('/fwd_update','File\FileController@fwd_update')->name('fwd.fwd_update');
		Route::get('/keep/{id}','File\FileController@keep')->name('keep.files');
		Route::get('/keep_update','File\FileController@keep_update')->name('keep.keep_update');
		Route::get('/deferred_files','File\FileController@deferred_files')->name('deferred_list.files');
		
		Route::get('/deferred/{id}','File\FileController@deferred')->name('deferred.files');
		Route::get('/deferred_update','File\FileController@deferred_update')->name('deferred.deferred_update');
		Route::get('/cancelled/{id}','File\FileController@cancelled')->name('cancelled.files');
		Route::get('/cancelled_update','File\FileController@cancelled_update')->name('cancelled.cancelled_update');
		Route::get('/cancelled_files','File\FileController@cancelled_files')->name('cancelled_list.files');
		Route::get('/release/{id}','File\FileController@release')->name('release.files');
		Route::get('/release_update','File\FileController@release_update')->name('release.release_update');
		Route::get('/released_files','File\FileController@released_files')->name('released_list.files');
		Route::get('/kept_files','File\FileController@kept_files')->name('kept_list.files');
		Route::get('/accept/{id}','File\FileController@accept')->name('accept.files');
		Route::get('/accept_update','File\FileController@accept_update')->name('accept.files_update');
		Route::get('pening_files','File\FileController@pening_files')->name('files.pening_files');
		Route::get('request_files','File\FileController@requestedFile')->name('files.request_files');
		Route::get('aprove_files','File\FileController@aprovedRequest')->name('files.aprove_files');
		Route::post('rqaprove','File\FileController@rqaprove')->name('files.rqaprove');
		Route::get('need_aprove','File\FileController@need_aprove')->name('files.need_aprove');
		Route::post('mark_aprove','File\FileController@mark_aprove')->name('files.mark_aprove');

		/**************************** Route File ****************************/
		/**************************** Route Category ****************************/

		Route::resource('/categories','Category\CategoryController');
		Route::get('/categories_upload_page','Category\CategoryController@upload_page')->name('categories.upload_page');
		Route::post('/categories_csv_upload','Category\CategoryController@upload_process')->name('categories.upload_process');
		Route::get('/categories_download_csv','Category\CategoryController@download_sample_csv')->name('categories.download_csv');
		Route::get('/categories_export_csv','Category\CategoryController@export_categories')->name('categories.export_csv');
		Route::post('/categories_bulk_delete','Category\CategoryController@bulk_delet')->name('categories.bulk_delet');
		Route::get('/categories_restore/{id}','Category\CategoryController@restore_single')->name('categories.restore_single');
		Route::get('/categories_bulk_restore','Category\CategoryController@restore_bulk')->name('categories.restore_bulk');
		Route::get('/categories_deleted_show','Category\CategoryController@show_deleted')->name('categories.show_deleted');
		Route::post('/categories_permDelete/{id}','Category\CategoryController@perm_Delete');
		Route::post('/categories_bulk_permDelete','Category\CategoryController@perm_bulk_delet');
		Route::post('/categories_check','Category\CategoryController@check_categories')->name('check.categories');
		Route::post('/categories_get','Category\CategoryController@get_categories')->name('get.categories');

		/**************************** Route Category ****************************/
		/**************************** Route Classification ****************************/

		Route::resource('/classifications','Classification\ClassificationController');
		Route::get('/classifications_upload_page','Classification\ClassificationController@upload_page')->name('classifications.upload_page');
		Route::post('/classifications_csv_upload','Classification\ClassificationController@upload_process')->name('classifications.upload_process');
		Route::get('/classifications_download_csv','Classification\ClassificationController@download_sample_csv')->name('classifications.download_csv');
		Route::get('/classifications_export_csv','Classification\ClassificationController@export_classifications')->name('classifications.export_csv');
		Route::post('/classifications_bulk_delete','Classification\ClassificationController@bulk_delet')->name('classifications.bulk_delet');
		Route::get('/classifications_restore/{id}','Classification\ClassificationController@restore_single')->name('classifications.restore_single');
		Route::get('/classifications_bulk_restore','Classification\ClassificationController@restore_bulk')->name('classifications.restore_bulk');
		Route::get('/classifications_deleted_show','Classification\ClassificationController@show_deleted')->name('classifications.show_deleted');
		Route::post('/classifications_permDelete/{id}','Classification\ClassificationController@perm_Delete');
		Route::post('/classifications_bulk_permDelete','Classification\ClassificationController@perm_bulk_delet');
		Route::post('/classifications_check','Classification\ClassificationController@check_classifications')->name('check.classifications');
		Route::post('/classifications_get','Classification\ClassificationController@get_classifications')->name('get.classifications');

		/**************************** Route Classification ****************************/
		/**************************** Route Department ****************************/

	Route::resource('/departments','Department\DepartmentController');
	Route::get('/departments_upload_page','Department\DepartmentController@upload_page')->name('departments.upload_page');
	Route::post('/departments_csv_upload','Department\DepartmentController@upload_process')->name('departments.upload_process');
	Route::get('/departments_download_csv','Department\DepartmentController@download_sample_csv')->name('departments.download_csv');
	Route::get('/departments_export_csv','Department\DepartmentController@export_departments')->name('departments.export_csv');
	Route::post('/departments_bulk_delete','Department\DepartmentController@bulk_delet')->name('departments.bulk_delet');
	Route::get('/departments_restore/{id}','Department\DepartmentController@restore_single')->name('departments.restore_single');
	Route::get('/departments_bulk_restore','Department\DepartmentController@restore_bulk')->name('departments.restore_bulk');
	Route::get('/departments_deleted_show','Department\DepartmentController@show_deleted')->name('departments.show_deleted');
	Route::post('/departments_permDelete/{id}','Department\DepartmentController@perm_Delete');
	Route::post('/departments_bulk_permDelete','Department\DepartmentController@perm_bulk_delet');
	Route::post('/departments_check','Department\DepartmentController@check_departments')->name('check.departments');
	Route::post('/departments_get','Department\DepartmentController@get_departments')->name('get.departments');

	/**************************** Route Department ****************************/
	/**************************** Route Personnel ****************************/

	Route::resource('/personnels','Personnel\PersonnelController');
	Route::get('/personnels_upload_page','Personnel\PersonnelController@upload_page')->name('personnels.upload_page');
	Route::post('/personnels_csv_upload','Personnel\PersonnelController@upload_process')->name('personnels.upload_process');
	Route::get('/personnels_download_csv','Personnel\PersonnelController@download_sample_csv')->name('personnels.download_csv');
	Route::get('/personnels_export_csv','Personnel\PersonnelController@export_personnels')->name('personnels.export_csv');
	Route::post('/personnels_bulk_delete','Personnel\PersonnelController@bulk_delet')->name('personnels.bulk_delet');
	Route::get('/personnels_restore/{id}','Personnel\PersonnelController@restore_single')->name('personnels.restore_single');
	Route::get('/personnels_bulk_restore','Personnel\PersonnelController@restore_bulk')->name('personnels.restore_bulk');
	Route::get('/personnels_deleted_show','Personnel\PersonnelController@show_deleted')->name('personnels.show_deleted');
	Route::post('/personnels_permDelete/{id}','Personnel\PersonnelController@perm_Delete');
	Route::post('/personnels_bulk_permDelete','Personnel\PersonnelController@perm_bulk_delet');
	Route::post('/personnels_check','Personnel\PersonnelController@check_personnels')->name('check.personnels');
	Route::post('/personnels_get','Personnel\PersonnelController@get_personnels')->name('get.personnels');

/**************************** Route Personnel ****************************/
/**************************** Route Office ****************************/

Route::resource('/offices','Office\OfficeController');
Route::get('/offices_upload_page','Office\OfficeController@upload_page')->name('offices.upload_page');
Route::post('/offices_csv_upload','Office\OfficeController@upload_process')->name('offices.upload_process');
Route::get('/offices_download_csv','Office\OfficeController@download_sample_csv')->name('offices.download_csv');
Route::get('/offices_export_csv','Office\OfficeController@export_offices')->name('offices.export_csv');
Route::post('/offices_bulk_delete','Office\OfficeController@bulk_delet')->name('offices.bulk_delet');
Route::get('/offices_restore/{id}','Office\OfficeController@restore_single')->name('offices.restore_single');
Route::get('/offices_bulk_restore','Office\OfficeController@restore_bulk')->name('offices.restore_bulk');
Route::get('/offices_deleted_show','Office\OfficeController@show_deleted')->name('offices.show_deleted');
Route::post('/offices_permDelete/{id}','Office\OfficeController@perm_Delete');
Route::post('/offices_bulk_permDelete','Office\OfficeController@perm_bulk_delet');
Route::post('/offices_check','Office\OfficeController@check_offices')->name('check.offices');
Route::post('/offices_get','Office\OfficeController@get_offices')->name('get.offices');

/**************************** Route Office ****************************/
/**************************** Route Section ****************************/

Route::resource('/sections','Section\SectionController');
Route::get('/sections_upload_page','Section\SectionController@upload_page')->name('sections.upload_page');
Route::post('/sections_csv_upload','Section\SectionController@upload_process')->name('sections.upload_process');
Route::get('/sections_download_csv','Section\SectionController@download_sample_csv')->name('sections.download_csv');
Route::get('/sections_export_csv','Section\SectionController@export_sections')->name('sections.export_csv');
Route::post('/sections_bulk_delete','Section\SectionController@bulk_delet')->name('sections.bulk_delet');
Route::get('/sections_restore/{id}','Section\SectionController@restore_single')->name('sections.restore_single');
Route::get('/sections_bulk_restore','Section\SectionController@restore_bulk')->name('sections.restore_bulk');
Route::get('/sections_deleted_show','Section\SectionController@show_deleted')->name('sections.show_deleted');
Route::post('/sections_permDelete/{id}','Section\SectionController@perm_Delete');
Route::post('/sections_bulk_permDelete','Section\SectionController@perm_bulk_delet');
Route::post('/sections_check','Section\SectionController@check_sections')->name('check.sections');
Route::post('/sections_get','Section\SectionController@get_sections')->name('get.sections');

/**************************** Route Section ****************************/
/**************************** Route Gender ****************************/

Route::resource('/genders','Gender\GenderController');
Route::get('/genders_upload_page','Gender\GenderController@upload_page')->name('genders.upload_page');
Route::post('/genders_csv_upload','Gender\GenderController@upload_process')->name('genders.upload_process');
Route::get('/genders_download_csv','Gender\GenderController@download_sample_csv')->name('genders.download_csv');
Route::get('/genders_export_csv','Gender\GenderController@export_genders')->name('genders.export_csv');
Route::post('/genders_bulk_delete','Gender\GenderController@bulk_delet')->name('genders.bulk_delet');
Route::get('/genders_restore/{id}','Gender\GenderController@restore_single')->name('genders.restore_single');
Route::get('/genders_bulk_restore','Gender\GenderController@restore_bulk')->name('genders.restore_bulk');
Route::get('/genders_deleted_show','Gender\GenderController@show_deleted')->name('genders.show_deleted');
Route::post('/genders_permDelete/{id}','Gender\GenderController@perm_Delete');
Route::post('/genders_bulk_permDelete','Gender\GenderController@perm_bulk_delet');
Route::post('/genders_check','Gender\GenderController@check_genders')->name('check.genders');
Route::post('/genders_get','Gender\GenderController@get_genders')->name('get.genders');

/**************************** Route Gender ****************************/

/**************************** Route Building ****************************/

Route::resource('/buildings','Building\BuildingController');
Route::get('/buildings_upload_page','Building\BuildingController@upload_page')->name('buildings.upload_page');
Route::post('/buildings_csv_upload','Building\BuildingController@upload_process')->name('buildings.upload_process');
Route::get('/buildings_download_csv','Building\BuildingController@download_sample_csv')->name('buildings.download_csv');
Route::get('/buildings_export_csv','Building\BuildingController@export_buildings')->name('buildings.export_csv');
Route::post('/buildings_bulk_delete','Building\BuildingController@bulk_delet')->name('buildings.bulk_delet');
Route::get('/buildings_restore/{id}','Building\BuildingController@restore_single')->name('buildings.restore_single');
Route::get('/buildings_bulk_restore','Building\BuildingController@restore_bulk')->name('buildings.restore_bulk');
Route::get('/buildings_deleted_show','Building\BuildingController@show_deleted')->name('buildings.show_deleted');
Route::post('/buildings_permDelete/{id}','Building\BuildingController@perm_Delete');
Route::post('/buildings_bulk_permDelete','Building\BuildingController@perm_bulk_delet');
Route::post('/buildings_check','Building\BuildingController@check_buildings')->name('check.buildings');
Route::post('/buildings_get','Building\BuildingController@get_buildings')->name('get.buildings');

/**************************** Route Building ****************************/
/**************************** Route Office ****************************/

Route::resource('/offices','Office\OfficeController');
Route::get('/offices_upload_page','Office\OfficeController@upload_page')->name('offices.upload_page');
Route::post('/offices_csv_upload','Office\OfficeController@upload_process')->name('offices.upload_process');
Route::get('/offices_download_csv','Office\OfficeController@download_sample_csv')->name('offices.download_csv');
Route::get('/offices_export_csv','Office\OfficeController@export_offices')->name('offices.export_csv');
Route::post('/offices_bulk_delete','Office\OfficeController@bulk_delet')->name('offices.bulk_delet');
Route::get('/offices_restore/{id}','Office\OfficeController@restore_single')->name('offices.restore_single');
Route::get('/offices_bulk_restore','Office\OfficeController@restore_bulk')->name('offices.restore_bulk');
Route::get('/offices_deleted_show','Office\OfficeController@show_deleted')->name('offices.show_deleted');
Route::post('/offices_permDelete/{id}','Office\OfficeController@perm_Delete');
Route::post('/offices_bulk_permDelete','Office\OfficeController@perm_bulk_delet');
Route::post('/offices_check','Office\OfficeController@check_offices')->name('check.offices');
Route::post('/offices_get','Office\OfficeController@get_offices')->name('get.offices');

/**************************** Route Office ****************************/
/**************************** Route Login ****************************/

Route::resource('/logins','Login\LoginController');
Route::get('/logins_upload_page','Login\LoginController@upload_page')->name('logins.upload_page');
Route::post('/logins_csv_upload','Login\LoginController@upload_process')->name('logins.upload_process');
Route::get('/logins_download_csv','Login\LoginController@download_sample_csv')->name('logins.download_csv');
Route::get('/logins_export_csv','Login\LoginController@export_logins')->name('logins.export_csv');
Route::post('/logins_bulk_delete','Login\LoginController@bulk_delet')->name('logins.bulk_delet');
Route::get('/logins_restore/{id}','Login\LoginController@restore_single')->name('logins.restore_single');
Route::get('/logins_bulk_restore','Login\LoginController@restore_bulk')->name('logins.restore_bulk');
Route::get('/logins_deleted_show','Login\LoginController@show_deleted')->name('logins.show_deleted');
Route::post('/logins_permDelete/{id}','Login\LoginController@perm_Delete');
Route::post('/logins_bulk_permDelete','Login\LoginController@perm_bulk_delet');
Route::post('/logins_check','Login\LoginController@check_logins')->name('check.logins');
Route::post('/logins_get','Login\LoginController@get_logins')->name('get.logins');

/**************************** Route Login ****************************/
	});
	Route::group(['middleware' => ['role:SuperAdmin']], function() {
		
	});
	Route::group(['middleware' => ['role:ActionOfficer']], function() {
		
	});
	Route::group(['middleware' => ['role:RMU']], function() {
		
	});
	Route::group(['middleware' => ['role:SuperAdmin|SuperUser|RMU|ActionOfficer']], function() {
		/**************************** Route Profile ****************************/
		Route::resource('/profiles','Profile\ProfileController');
		Route::post('/profiles_bulk_delete','Profile\ProfileController@bulk_delet')->name('profiles.bulk_delet');
		Route::get('/profiles_restore/{id}','Profile\ProfileController@restore_single')->name('profiles.restore_single');
		Route::get('/profiles_bulk_restore','Profile\ProfileController@restore_bulk')->name('profiles.restore_bulk');
		Route::get('/profiles_deleted_show','Profile\ProfileController@show_deleted')->name('profiles.show_deleted');
		Route::post('/profiles_permDelete/{id}','Profile\ProfileController@perm_Delete');
		Route::post('/profiles_bulk_permDelete','Profile\ProfileController@perm_bulk_delet');
		Route::post('/profiles_check','Profile\ProfileController@check_profiles')->name('check.profiles');
		Route::post('/profiles_get','Profile\ProfileController@get_profiles')->name('get.profiles');
		/**************************** Route Profile ****************************/
		/**************************** Route Dashboard  ****************************/
		Route::get('/dashboard','Dashboard\AdminDashboardController@index')->name('dashboard');
		/**************************** Route Dashboard  ****************************/
		/**************************** Route activities ****************************/
		Route::resource('/activities','Activity\ActivityController');
		/**************************** Route activities ****************************/
		

});

});
