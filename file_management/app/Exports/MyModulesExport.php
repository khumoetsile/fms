<?php
  
namespace App\Exports;
  
use App\MyModule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class MyModulesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MyModule::all('mymodule_code','mymodule_name');
    }

    public function headings(): array
    {
        return [
            'mymodule_code',
            'mymodule_name',
        ];
    }
}