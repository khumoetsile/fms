<?php
  
namespace App\Exports;
  
use App\Building;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class BuildingsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Building::all('building_code','building_name');
    }

    public function headings(): array
    {
        return [
            'building_code',
            'building_name',
        ];
    }
}