<?php
  
namespace App\Exports;
  
use App\EmailTemplate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class EmailTemplatesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmailTemplate::all('emailtemplate_code','emailtemplate_name');
    }

    public function headings(): array
    {
        return [
            'emailtemplate_code',
            'emailtemplate_name',
        ];
    }
}