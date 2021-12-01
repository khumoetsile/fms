<?php
  
namespace App\Exports;
  
use App\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class CompaniesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Company::all(
            'company_reg_date',
            'company_code',
            'company_name',
            'company_slogan',
            'company_address1',
            'company_address2',
            'company_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'company_phone',
            'company_phone2',
            'company_mobile',
            'company_mobile2',
            'company_email',
            'company_image',
            'company_status'
        );
    }

    public function headings(): array
    {
        return [
            'company_reg_date',
            'company_code',
            'company_name',
            'company_slogan',
            'company_address1',
            'company_address2',
            'company_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'company_phone',
            'company_phone2',
            'company_mobile',
            'company_mobile2',
            'company_email',
            'company_image',
            'company_status'
        ];
    }
}