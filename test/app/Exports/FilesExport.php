<?php
  
namespace App\Exports;
  
use App\File;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class FilesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return File::all(
            'file_reg_date',
            'file_code',
            'file_name',
            'file_slogan',
            'file_address1',
            'file_address2',
            'file_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'file_phone',
            'file_phone2',
            'file_mobile',
            'file_mobile2',
            'file_email',
            'file_image'
        );
    }

    public function headings(): array
    {
        return [
            'file_reg_date',
            'file_code',
            'file_name',
            'file_slogan',
            'file_address1',
            'file_address2',
            'file_address3',
            'country_id',
            'state_id',
            'city_id',
            'area_name',
            'zip_code',
            'file_phone',
            'file_phone2',
            'file_mobile',
            'file_mobile2',
            'file_email',
            'file_image',
        ];
    }
}