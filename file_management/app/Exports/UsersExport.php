<?php
  
namespace App\Exports;
  
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class UsersExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all('accounts_number','email','username','fname','lname','designation','section_name','section_name','email_verified_at','profile_pic','user_status','accounts_id','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by');
    }

    public function headings(): array
    {
        return [
            'accounts_number',
            'email',
            'username',
            'fname',
            'lname',
            'designation',
            'section_name',
            'section_name',
            'email_verified_at',
            'profile_pic',
            'user_status',
            'accounts_id',
            'created_at',
            'updated_at',
            'deleted_at',
            'created_by',
            'updated_by',
            'deleted_by'
        ];
    }
}