<?php
  
namespace App\Exports;
  
use App\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class JobsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Job::all('job_code','job_name');
    }

    public function headings(): array
    {
        return [
            'job_code',
            'job_name',
        ];
    }
}