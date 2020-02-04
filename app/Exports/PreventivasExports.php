<?php

namespace App\Exports;

use App\Preventiva;
use App\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PreventivasExports implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'ID',
            'Cliente',
            'Instância',
            'Cluster',
            'Cidade',
            'Reclamação',
            'Status',
            'Resolução',
            'Tipificação',
            'Encerramento',
            'User_ID',
            'Solicitado por',
            'Tecnologia',
            'Abertura',
            'Fechamento'
        ];
    }


    public function collection()
    {
        $user = User::find(Auth::id());
        $cluster = $user->cluster;

        return Preventiva::where('cluster', $cluster);

    }


}