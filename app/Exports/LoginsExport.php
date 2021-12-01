<?php
  
namespace App\Exports;
  
use App\Login;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class LoginsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Login::all('login_code','login_name');
    }

    public function headings(): array
    {
        return [
            'login_code',
            'login_name',
        ];
    }
}