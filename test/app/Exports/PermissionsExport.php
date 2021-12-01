<?php
  
namespace App\Exports;
  
use App\Permission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PermissionsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permission::all('permission_code','permission_name');
    }

    public function headings(): array
    {
        return [
            'permission_code',
            'permission_name',
        ];
    }
}