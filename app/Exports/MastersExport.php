<?php
  
namespace App\Exports;
  
use App\Master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class MastersExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Master::all('master_code','master_name');
    }

    public function headings(): array
    {
        return [
            'master_code',
            'master_name',
        ];
    }
}