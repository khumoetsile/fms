<?php
  
namespace App\Exports;
  
use App\SubHead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class SubHeadsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SubHead::all('subhead_code','subhead_name');
    }

    public function headings(): array
    {
        return [
            'subhead_code',
            'subhead_name',
        ];
    }
}