<?php
  
namespace App\Exports;
  
use App\Class;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ClassesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Class::all('class_code','class_name');
    }

    public function headings(): array
    {
        return [
            'class_code',
            'class_name',
        ];
    }
}