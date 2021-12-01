<?


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
