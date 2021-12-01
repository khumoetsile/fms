<?php
  
namespace App\Exports;
  
use App\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class RegistrationsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Registration::all('registration_code','registration_name');
    }

    public function headings(): array
    {
        return [
            'registration_code',
            'registration_name',
        ];
    }
}