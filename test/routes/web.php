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
Route::resource('/','Welcome');
//Route::get('/', function () {return view('welcome');});
Route::get('404', function () {return view('errors.404');});
Route::get('500', function () {return view('errors.500');});
Route::get('403', function () {return view('errors.403-full')->name('error.403');});


/**************************** Route Public ****************************/
/**************************** Route Country ****************************/
	Route::resource('/countries','Country\CountryController');
	Route::get('/countries_upload_page','Country\CountryController@upload_page')->name('countries.upload_page');
	Route::post('/countries_csv_upload','Country\CountryController@upload_process')->name('countries.upload_process');
	Route::get('/countries_download_csv','Country\CountryController@download_sample_csv')->name('countries.download_csv');
	Route::get('/countries_export_csv','Country\CountryController@export_countries')->name('countries.export_csv');
	Route::post('/countries_bulk_delete','Country\CountryController@bulk_delet')->name('countries.bulk_delet');
	Route::get('/countries_restore/{id}','Country\CountryController@restore_single')->name('countries.restore_single');
	Route::get('/countries_bulk_restore','Country\CountryController@restore_bulk')->name('countries.restore_bulk');
	Route::get('/countries_deleted_show','Country\CountryController@show_deleted')->name('countries.show_deleted');
	Route::post('/countries_permDelete/{id}','Country\CountryController@perm_Delete');
	Route::post('/countries_bulk_permDelete','Country\CountryController@perm_bulk_delet');
	Route::post('/countries_check','Country\CountryController@check_countries')->name('check.countries');
	Route::post('/countries_get','Country\CountryController@get_countries')->name('get.countries');
	/**************************** Route Country ****************************/
	/**************************** Route State ****************************/
	Route::resource('/states','State\StateController');
	Route::get('/states_upload_page','State\StateController@upload_page')->name('states.upload_page');
	Route::post('/states_csv_upload','State\StateController@upload_process')->name('states.upload_process');
	Route::get('/states_download_csv','State\StateController@download_sample_csv')->name('states.download_csv');
	Route::get('/states_export_csv','State\StateController@export_states')->name('states.export_csv');
	Route::post('/states_bulk_delete','State\StateController@bulk_delet')->name('states.bulk_delet');
	Route::get('/states_restore/{id}','State\StateController@restore_single')->name('states.restore_single');
	Route::get('/states_bulk_restore','State\StateController@restore_bulk')->name('states.restore_bulk');
	Route::get('/states_deleted_show','State\StateController@show_deleted')->name('states.show_deleted');
	Route::post('/states_permDelete/{id}','State\StateController@perm_Delete');
	Route::post('/states_bulk_permDelete','State\StateController@perm_bulk_delet');
	Route::post('/states_check','State\StateController@check_states')->name('check.states');
	Route::post('/states_get','State\StateController@get_states')->name('get.states');
	/**************************** Route State ****************************/
	/**************************** Route City ****************************/
	Route::resource('/cities','City\CityController');
	Route::get('/cities_upload_page','City\CityController@upload_page')->name('cities.upload_page');
	Route::post('/cities_csv_upload','City\CityController@upload_process')->name('cities.upload_process');
	Route::get('/cities_download_csv','City\CityController@download_sample_csv')->name('cities.download_csv');
	Route::get('/cities_export_csv','City\CityController@export_cities')->name('cities.export_csv');
	Route::post('/cities_bulk_delete','City\CityController@bulk_delet')->name('cities.bulk_delet');
	Route::get('/cities_restore/{id}','City\CityController@restore_single')->name('cities.restore_single');
	Route::get('/cities_bulk_restore','City\CityController@restore_bulk')->name('cities.restore_bulk');
	Route::get('/cities_deleted_show','City\CityController@show_deleted')->name('cities.show_deleted');
	Route::post('/cities_permDelete/{id}','City\CityController@perm_Delete');
	Route::post('/cities_bulk_permDelete','City\CityController@perm_bulk_delet');
	Route::post('/cities_check','City\CityController@check_cities')->name('check.cities');
	Route::post('/cities_get','City\CityController@get_cities')->name('get.cities');
	/**************************** Route City ****************************/
	/**************************** Route Contact ****************************/

	Route::resource('/contacts','Contact\ContactController');
	Route::get('/contacts_upload_page','Contact\ContactController@upload_page')->name('contacts.upload_page');
	Route::post('/contacts_csv_upload','Contact\ContactController@upload_process')->name('contacts.upload_process');
	Route::get('/contacts_download_csv','Contact\ContactController@download_sample_csv')->name('contacts.download_csv');
	Route::get('/contacts_export_csv','Contact\ContactController@export_contacts')->name('contacts.export_csv');
	Route::post('/contacts_bulk_delete','Contact\ContactController@bulk_delet')->name('contacts.bulk_delet');
	Route::get('/contacts_restore/{id}','Contact\ContactController@restore_single')->name('contacts.restore_single');
	Route::get('/contacts_bulk_restore','Contact\ContactController@restore_bulk')->name('contacts.restore_bulk');
	Route::get('/contacts_deleted_show','Contact\ContactController@show_deleted')->name('contacts.show_deleted');
	Route::post('/contacts_permDelete/{id}','Contact\ContactController@perm_Delete');
	Route::post('/contacts_bulk_permDelete','Contact\ContactController@perm_bulk_delet');
	Route::post('/contacts_check','Contact\ContactController@check_contacts')->name('check.contacts');
	Route::post('/contacts_get','Contact\ContactController@get_contacts')->name('get.contacts');

	/**************************** Route Contact ****************************/
/**************************** Route Job ****************************/

	Route::resource('/jobs','Job\JobController');
	Route::get('/jobs_upload_page','Job\JobController@upload_page')->name('jobs.upload_page');
	Route::post('/jobs_csv_upload','Job\JobController@upload_process')->name('jobs.upload_process');
	Route::get('/jobs_download_csv','Job\JobController@download_sample_csv')->name('jobs.download_csv');
	Route::get('/jobs_export_csv','Job\JobController@export_jobs')->name('jobs.export_csv');
	Route::post('/jobs_bulk_delete','Job\JobController@bulk_delet')->name('jobs.bulk_delet');
	Route::get('/jobs_restore/{id}','Job\JobController@restore_single')->name('jobs.restore_single');
	Route::get('/jobs_bulk_restore','Job\JobController@restore_bulk')->name('jobs.restore_bulk');
	Route::get('/jobs_deleted_show','Job\JobController@show_deleted')->name('jobs.show_deleted');
	Route::post('/jobs_permDelete/{id}','Job\JobController@perm_Delete');
	Route::post('/jobs_bulk_permDelete','Job\JobController@perm_bulk_delet');
	Route::post('/jobs_check','Job\JobController@check_jobs')->name('check.jobs');
	Route::post('/jobs_get','Job\JobController@get_jobs')->name('get.jobs');


	
/**************************** Route Public ****************************/

/**************************** Route Public ****************************/

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth']], function() {
	
	
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
	Route::group(['middleware' => ['role:SuperAdmin|Admin|Customer']], function() {
	/**************************** Route Dashboard  ****************************/
	Route::get('/dashboard','Dashboard\AdminDashboardController@index')->name('dashboard');
	/**************************** Route Dashboard  ****************************/
	/**************************** Route Customers admin ****************************/
	Route::get('/users_all_customers','User\UserController@get_CustomerUsers')->name('get.users_all_customers');
	/**************************** Route Customers for admin ****************************/
	/**************************** Route activities ****************************/
	Route::resource('/activities','Activity\ActivityController');
	/**************************** Route activities ****************************/
	/**************************** Route Backup  ****************************/
	Route::get('/backup','Backup\BackupController@create')->name('backup');
	Route::get('/backupdatabase', function () { $exitCode = Artisan::call('backup:run');});
	/**************************** Route Backup  ****************************/

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
	Route::get('/users_bulk_restore','User\UserController@restore_bulk')->name('users.restore_bulk');
	Route::post('/users_bulk_delete','User\UserController@bulk_delet')->name('users.bulk_delet');
	Route::post('/users_permDelete/{id}','User\UserController@perm_Delete');
	Route::post('/users_check','User\UserController@check_users')->name('check.users');
	Route::post('/users_get','CommonFunctionController@get_Users')->name('get.users');
	Route::get('/users_get_admins','User\UserController@get_AdminUsers')->name('get.users_admins');
	Route::get('/users_get_managers','User\UserController@get_ManagerUsers')->name('get.users_managers');
	
	
	/**************************** Route Users ****************************/
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
	});

});
