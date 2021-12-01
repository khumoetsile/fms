<?php
  
namespace App\Exports;
  
use App\Classification;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ClassificationsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Classification::all('classification_code','classification_name');
    }

    public function headings(): array
    {
        return [
            'classification_code',
            'classification_name',
        ];
    }
}