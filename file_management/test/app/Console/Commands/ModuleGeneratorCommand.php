<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {name : Class (singular), e.g User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'One Word Auto Programmer Credit: Wqar Hussain';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $input = $this->argument('name');
        $name  = ucfirst($input);

        $this->controller($name);
        $this->addblade($name);
        $this->deletedblade($name);
        //$this->factory($name);
        $this->export($name);
        $this->indexblade($name);
        $this->migration($name);
        $this->model($name);
        $this->showblade($name);
        $this->editblade($name);
        $this->uploadblade($name);
        //$this->showDeleted($name);

        $small = strtolower(str_plural($name));
        $dir = ucfirst($name);

file_put_contents("routes/wqarPaths.php", "/**************************** Route $dir ****************************/" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::resource('/{$small}','$dir"."\\{$dir}Controller');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::get('/{$small}_upload_page','$dir"."\\{$dir}Controller@upload_page')->name('{$small}.upload_page');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::post('/{$small}_csv_upload','$dir"."\\{$dir}Controller@upload_process')->name('{$small}.upload_process');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::get('/{$small}_download_csv','$dir"."\\{$dir}Controller@download_sample_csv')->name('{$small}.download_csv');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::get('/{$small}_export_csv','$dir"."\\{$dir}Controller@export_{$small}')->name('{$small}.export_csv');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::post('/{$small}_bulk_delete','$dir"."\\{$dir}Controller@bulk_delet')->name('{$small}.bulk_delet');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::get('/{$small}_restore/{id}','$dir"."\\{$dir}Controller@restore_single')->name('{$small}.restore_single');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::get('/{$small}_bulk_restore','$dir"."\\{$dir}Controller@restore_bulk')->name('{$small}.restore_bulk');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::get('/{$small}_deleted_show','$dir"."\\{$dir}Controller@show_deleted')->name('{$small}.show_deleted');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::post('/{$small}_permDelete/{id}','$dir"."\\{$dir}Controller@perm_Delete');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::post('/{$small}_bulk_permDelete','$dir"."\\{$dir}Controller@perm_bulk_delet');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::post('/{$small}_check','$dir"."\\{$dir}Controller@check_{$small}')->name('check.{$small}');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "Route::post('/{$small}_get','$dir"."\\{$dir}Controller@get_{$small}')->name('get.{$small}');" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "" . "\n", FILE_APPEND);
file_put_contents("routes/wqarPaths.php", "/**************************** Route $dir ****************************/" . "\n", FILE_APPEND);
    }

    /**
     * [getStub Type]
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    protected function getStub($type)
    {
    return file_get_contents(resource_path("stubs/module/$type.stub"));
    }

    /**
     * [Create Controller File to Controllers Folder]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function controller($name)
    {
    $controllerTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Controller')
    );

    $controller = ucfirst($name);
    $dirname = ucfirst($name);

    if(!file_exists($path = app_path('/Http/Controllers/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(app_path("/Http/Controllers/$dirname/{$controller}Controller.php"), $controllerTemplate);

    }

    /**
     * [Create Controller File to Controllers Folder]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function export($name)
    {
    $exportTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Export')
    );

    $export = ucfirst(str_plural($name));
    $dirname = ucfirst($name);

    if(!file_exists($path = app_path('/Exports/')))
        mkdir($path, 0777, true);

    file_put_contents(app_path("/Exports/{$export}Export.php"), $exportTemplate);

    }

    /**
     * [Function to Create Model File to App Folder]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function model($name)
    {
    $modelTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Model')
    );

    $model = ucfirst($name);

    file_put_contents(app_path("/{$model}.php"), $modelTemplate);
    }

    /**
     * [Create Migrations File under Migrations Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function migration($name)
    {

    $migrationTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Migration')
    );

    $migration = strtolower(str_plural($name));
    $timestamp = date("Y_m_d_His"); //Add time stamp in migration table add {$timestamp}_ before create without spaces

    file_put_contents(base_path("/database/migrations/{$timestamp}_create_{$migration}_table.php"), $migrationTemplate);
    }

    /**
     * [Create Factory/Faker File under Factory Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function factory($name)
    {

    $fakerTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Factory')
    );

    $factory = ucfirst($name);

    file_put_contents(base_path("/database/factories/{$factory}Factory.php"), $fakerTemplate);
    }

    /**
     * [Create Add Blade Form File under View / {{modelName}} Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function addblade($name)
    {

    $addBladeTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Create')
    );

    $create = strtolower(str_plural($name));
    $dirname = strtolower(str_plural($name));

    if(!file_exists($path = base_path('/resources/views/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(base_path("/resources/views/$dirname/create_$create.blade.php"), $addBladeTemplate);
    }


    /**
     * [Create Edit Blade Form File under View / {{modelName}} Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function editblade($name)
    {

    $editBladeTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('update')
    );

    $update = strtolower(str_plural($name));
    $dirname = strtolower(str_plural($name));

    if(!file_exists($path = base_path('/resources/views/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(base_path("/resources/views/$dirname/update_$update.blade.php"), $editBladeTemplate);
    }

    /**
     * [Create index Blade Form File under View / {{modelName}} Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function indexblade($name)
    {

    $indexBladeTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Index')
    );

    $index = strtolower(str_plural($name));
    $dirname = strtolower(str_plural($name));

    if(!file_exists($path = base_path('/resources/views/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(base_path("/resources/views/$dirname/index_$index.blade.php"), $indexBladeTemplate);
    }


    /**
     * [Create Upload Blade Form File under View / {{modelName}} Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function uploadblade($name)
    {

    $editBladeTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Upload')
    );

    $upload = strtolower(str_plural($name));
    $dirname = strtolower(str_plural($name));

    if(!file_exists($path = base_path('/resources/views/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(base_path("/resources/views/$dirname/upload_{$upload}.blade.php"), $editBladeTemplate);
    }

    /**
     * [Create Show Blade Form File under View / {{modelName}} Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function showblade($name)
    {

    $showBladeTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Show')
    );

    $show = strtolower(str_plural($name));
    $dirname = strtolower(str_plural($name));

    if(!file_exists($path = base_path('/resources/views/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(base_path("/resources/views/$dirname/show_{$show}.blade.php"), $showBladeTemplate);
    }

    /**
     * [Create Show Blade Form File under View / {{modelName}} Directory]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function deletedblade($name)
    {

    $deleteBladeTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            ucfirst($name),
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Deleted')
    );

    $delete = strtolower(str_plural($name));
    $dirname = strtolower(str_plural($name));

    if(!file_exists($path = base_path('/resources/views/' . $dirname)))
        mkdir($path, 0777, true);

    file_put_contents(base_path("/resources/views/$dirname/deleted_{$delete}.blade.php"), $deleteBladeTemplate);
    }


}
