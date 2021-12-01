<?php
  
namespace App\Exports;
  
use App\DocumentType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class DocumentTypesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DocumentType::all('documenttype_code','documenttype_name');
    }

    public function headings(): array
    {
        return [
            'documenttype_code',
            'documenttype_name',
        ];
    }
}