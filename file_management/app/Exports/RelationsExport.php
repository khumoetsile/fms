<?php
  
namespace App\Exports;
  
use App\Relation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class RelationsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Relation::all(
            'relation_reg_date',
            'relation_code',
            'relation_name',
            'relation_slogan',
            'relation_address1',
            'relation_address2',
            'relation_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'relation_phone',
            'relation_phone2',
            'relation_mobile',
            'relation_mobile2',
            'relation_email',
            'relation_image'
        );
    }

    public function headings(): array
    {
        return [
            'relation_reg_date',
            'relation_code',
            'relation_name',
            'relation_slogan',
            'relation_address1',
            'relation_address2',
            'relation_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'relation_phone',
            'relation_phone2',
            'relation_mobile',
            'relation_mobile2',
            'relation_email',
            'relation_image',
        ];
    }
}