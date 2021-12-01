<?php
  
namespace App\Exports;
  
use App\File;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class FilesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return File::all('file_code','file_name');
    }

    public function headings(): array
    {
        return [
            'file_code',
            'file_name',
        ];
    }
}