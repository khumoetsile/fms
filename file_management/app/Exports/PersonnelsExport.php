<?php
  
namespace App\Exports;
  
use App\Personnel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PersonnelsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Personnel::all('personnel_code','personnel_name');
    }

    public function headings(): array
    {
        return [
            'personnel_code',
            'personnel_name',
        ];
    }
}