<?php
  
namespace App\Exports;
  
use App\Gender;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class GendersExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gender::all('gender_code','gender_name');
    }

    public function headings(): array
    {
        return [
            'gender_code',
            'gender_name',
        ];
    }
}