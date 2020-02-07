<?php

namespace App\Http\Controllers;

use App\Ba;
use App\User;
use App\Preventiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Exports\BasExports;
use Maatwebsite\Excel\Facades\Excel;

class BaController extends Controller
{

    public function solicitacao() 
    {
        return view('BA/solicitacao');
    }

    public function listaPriori()
    {

        $user_id = Auth::id();
        $user = User::find(Auth::id());
        $admin = Auth::user()->admin;
        $cluster = $user->cluster;

        if($admin == 'nao'){
            $bas = DB::table('bas')
                ->where('user_id', '=', $user_id)
                ->where('cluster', 'like', $cluster)
                ->orderBy('created_at', 'DESC')
                ->orderBy('status')
                ->simplePaginate(35);
            return view('BA/lista', ['bas'=>$bas]);
            }else {
                $bas = DB::table('bas')
                ->where('cluster', 'like', $cluster)
                ->orderBy('created_at', 'DESC')
                ->orderBy('status')
                ->simplePaginate(35);
            return view('BA/lista', ['bas'=>$bas]);
            }
    }

    
    public function cadastrarBa(Request $req)
    {

        $dados = $req->all();
        Ba::create($dados);

        return redirect()->route('listaBA')
            ->with('message', 'Priorização registrada.');

    }

    public function alteraStatus($id)
    {
        $ba = Ba::find($id);
        $ba->status='Em Tratamento';
        $ba->save();

        return redirect()->route('listaBA');
    }

    public function fecharStatus($id)
    {
        $registro = Ba::find($id);
        return view('BA/fechar', compact('registro'));
    }

    public function export() 
    {
        return Excel::download(new BasExports, 'PiorizacoesBA.xlsx');
    }

    public function realizarFechamento(Request $req, $id)
    {

        $mensagens = [
            'encerramento.between' => "Favor preencher o encerramento com no máximo 190 characteres"
        ];

        $this->validate($req,
            [
                'encerramento' => 'between:1,190',

            ], $mensagens);

        $dados = $req->all();

        if($req->trava == 'fechar'){
            Ba::find($id)->update($dados);
            return redirect()->route('listaBA');
        }else{
            $ba = Ba::find($id);
            $ba->feedback = $req->feedback;
            $ba->save();
        }
        return redirect()->route('listaBA');
    }

}
