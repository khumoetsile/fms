<?php
  
namespace App\Exports;
  
use App\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ContactsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::all(
            'contact_reg_date',
            'contact_code',
            'contact_name',
            'contact_slogan',
            'contact_address1',
            'contact_address2',
            'contact_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'contact_phone',
            'contact_phone2',
            'contact_mobile',
            'contact_mobile2',
            'contact_email',
            'contact_image'
        );
    }

    public function headings(): array
    {
        return [
            'contact_reg_date',
            'contact_code',
            'contact_name',
            'contact_slogan',
            'contact_address1',
            'contact_address2',
            'contact_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'contact_phone',
            'contact_phone2',
            'contact_mobile',
            'contact_mobile2',
            'contact_email',
            'contact_image',
        ];
    }
}