<?php
  
namespace App\Exports;
  
use App\Title;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class TitlesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Title::all('title_code','title_name');
    }

    public function headings(): array
    {
        return [
            'title_code',
            'title_name',
        ];
    }
}