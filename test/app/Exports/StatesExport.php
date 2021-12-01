<?php
  
namespace App\Exports;
  
use App\State;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class StatesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return State::all('state_code','state_name');
    }

    public function headings(): array
    {
        return [
            'state_code',
            'state_name',
        ];
    }
}