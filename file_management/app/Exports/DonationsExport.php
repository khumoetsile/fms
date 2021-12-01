<?php
  
namespace App\Exports;
  
use App\Donation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class DonationsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Donation::all(
            'donation_reg_date',
            'donation_code',
            'donation_name',
            'donation_slogan',
            'donation_address1',
            'donation_address2',
            'donation_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'donation_phone',
            'donation_phone2',
            'donation_mobile',
            'donation_mobile2',
            'donation_email',
            'donation_image'
        );
    }

    public function headings(): array
    {
        return [
            'donation_reg_date',
            'donation_code',
            'donation_name',
            'donation_slogan',
            'donation_address1',
            'donation_address2',
            'donation_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'donation_phone',
            'donation_phone2',
            'donation_mobile',
            'donation_mobile2',
            'donation_email',
            'donation_image',
        ];
    }
}