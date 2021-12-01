<?php
  
namespace App\Exports;
  
use App\Mode;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ModesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mode::all('mode_code','mode_name');
    }

    public function headings(): array
    {
        return [
            'mode_code',
            'mode_name',
        ];
    }
}