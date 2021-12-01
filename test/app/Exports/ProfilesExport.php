<?php
  
namespace App\Exports;
  
use App\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ProfilesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Profile::all(
            'profile_reg_date',
            'profile_code',
            'profile_name',
            'profile_slogan',
            'profile_address1',
            'profile_address2',
            'profile_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'profile_phone',
            'profile_phone2',
            'profile_mobile',
            'profile_mobile2',
            'profile_email',
            'profile_image'
        );
    }

    public function headings(): array
    {
        return [
            'profile_reg_date',
            'profile_code',
            'profile_name',
            'profile_slogan',
            'profile_address1',
            'profile_address2',
            'profile_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'profile_phone',
            'profile_phone2',
            'profile_mobile',
            'profile_mobile2',
            'profile_email',
            'profile_image',
        ];
    }
}