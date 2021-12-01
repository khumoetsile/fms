<?php
  
namespace App\Exports;
  
use App\Department;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class DepartmentsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Department::all('department_code','department_name');
    }

    public function headings(): array
    {
        return [
            'department_code',
            'department_name',
        ];
    }
}