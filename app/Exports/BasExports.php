<?php

namespace App\Exports;

use App\Ba;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BasExports implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'ID',
            'Cliente',
            'Documento',
            'Informação',
            'cluster',
            'Status',
            'Feedback',
            'Solicitado por',
            'Abertura',
            'Fechamento',
            'user_id'
        ];
    }


    public function collection()
    {
        return Ba::all();
    }


}