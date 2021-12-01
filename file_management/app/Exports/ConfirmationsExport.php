<?php
  
namespace App\Exports;
  
use App\Confirmation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ConfirmationsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Confirmation::all(
            'confirmation_reg_date',
            'confirmation_code',
            'confirmation_name',
            'confirmation_slogan',
            'confirmation_address1',
            'confirmation_address2',
            'confirmation_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'confirmation_phone',
            'confirmation_phone2',
            'confirmation_mobile',
            'confirmation_mobile2',
            'confirmation_email',
            'confirmation_image'
        );
    }

    public function headings(): array
    {
        return [
            'confirmation_reg_date',
            'confirmation_code',
            'confirmation_name',
            'confirmation_slogan',
            'confirmation_address1',
            'confirmation_address2',
            'confirmation_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'confirmation_phone',
            'confirmation_phone2',
            'confirmation_mobile',
            'confirmation_mobile2',
            'confirmation_email',
            'confirmation_image',
        ];
    }
}