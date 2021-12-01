<?php
  
namespace App\Exports;
  
use App\Printtemplate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PrinttemplatesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Printtemplate::all('printtemplate_code','printtemplate_name');
    }

    public function headings(): array
    {
        return [
            'printtemplate_code',
            'printtemplate_name',
        ];
    }
}