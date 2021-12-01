<?php
  
namespace App\Exports;
  
use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class CategoriesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all('category_code','category_name');
    }

    public function headings(): array
    {
        return [
            'category_code',
            'category_name',
        ];
    }
}