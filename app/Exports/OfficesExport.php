<?php
  
namespace App\Exports;
  
use App\Office;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class OfficesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Office::all('office_code','office_name');
    }

    public function headings(): array
    {
        return [
            'office_code',
            'office_name',
        ];
    }
}