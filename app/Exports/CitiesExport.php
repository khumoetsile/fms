<?php
  
namespace App\Exports;
  
use App\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class CitiesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return City::all('city_code','city_name');
    }

    public function headings(): array
    {
        return [
            'city_code',
            'city_name',
        ];
    }
}