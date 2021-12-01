<?php
  
namespace App\Exports;
  
use App\Document;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class DocumentsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Document::all('document_code','document_name');
    }

    public function headings(): array
    {
        return [
            'document_code',
            'document_name',
        ];
    }
}