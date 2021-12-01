<?php
  
namespace App\Exports;
  
use App\Section;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class SectionsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Section::all('section_code','section_name');
    }

    public function headings(): array
    {
        return [
            'section_code',
            'section_name',
        ];
    }
}