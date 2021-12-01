<?php
  
namespace App\Exports;
  
use App\Message;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class MessagesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Message::all('message_subject','message_number','message_body');
    }

    public function headings(): array
    {
        return [
            'message_subject',
            'message_number',
            'message_body',
        ];
    }
}