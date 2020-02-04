<?php

namespace App\Http\Controllers;

use App\Preventiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Exports\PreventivasExports;
use Maatwebsite\Excel\Facades\Excel;

class PreventivaController extends Controller
{


    public function cadastrarPreventiva(Request $req)
    {
        $mensagens = [
            'cliente.required' => "Necessário passar o nome do cliente",
            'reclamacao.between' => "Favor preencher a reclamacao com no maximo 220 characteres"
        ];

        $this->validate($req,
            [
                'cliente' => 'required',
                'reclamacao' => 'between:1,220',

            ], $mensagens);


        $dados = $req->all();
        Preventiva::create($dados);


        return redirect()->route('listar')
            ->with('message', 'Preventiva registrada.');

    }

    public function export() 
    {
        return Excel::download(new PreventivasExports, 'Preventivas.xlsx');
    }

}
