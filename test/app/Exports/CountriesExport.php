<?php
  
namespace App\Exports;
  
use App\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class CountriesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Country::all('country_code','country_name');
    }

    public function headings(): array
    {
        return [
            'country_code',
            'country_name',
        ];
    }
}