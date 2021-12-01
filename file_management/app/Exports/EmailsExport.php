<?php
  
namespace App\Exports;
  
use App\Email;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class EmailsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Email::all(
            'email_reg_date',
            'email_code',
            'email_name',
            'email_slogan',
            'email_address1',
            'email_address2',
            'email_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'email_phone',
            'email_phone2',
            'email_mobile',
            'email_mobile2',
            'email_email',
            'email_image'
        );
    }

    public function headings(): array
    {
        return [
            'email_reg_date',
            'email_code',
            'email_name',
            'email_slogan',
            'email_address1',
            'email_address2',
            'email_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'email_phone',
            'email_phone2',
            'email_mobile',
            'email_mobile2',
            'email_email',
            'email_image',
        ];
    }
}