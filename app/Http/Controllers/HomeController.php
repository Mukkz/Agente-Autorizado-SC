<?php

namespace App\Http\Controllers;

use App\Preventiva;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function fechar($id)
    {
        $registro = Preventiva::find($id);
        return view('fechar', compact('registro'));
    }
    public function realizarFechamento(Request $req, $id)
    {
        $mensagens = [
            'encerramento.between' => "Favor preencher o encerramento com no máximo 220 characteres"
        ];
        $this->validate($req,
            [
                'encerramento' => 'between:1,220',
            ], $mensagens);

        $dados = $req->all();

        if($req->trava == 'fechar'){
            Preventiva::find($id)->update($dados);
            return redirect()->route('listarADM');
        }else{
            $preventiva = Preventiva::find($id);
            $preventiva->encerramento = $req->encerramento;
            $preventiva->save();
        }
        return redirect()->route('listarADM');
    }

    public function editarInfo($id){

        $registro = Preventiva::find($id);
        return view('editaAA', compact('registro'));

    }

    public function editarAA(Request $req, $id){

        $dados = $req->all();

            $preventiva = Preventiva::find($id);
            $preventiva->reclamacao = $req->reclamacao;
            $preventiva->save();

        return redirect()->route('listar');

    }

    public function realizarAbertura($id)
    {
        $preventiva = Preventiva::find($id);
        $preventiva->encerramento= 'Ordem em aberto';
        $preventiva->status='Aberto';
        $preventiva->save();

        return redirect()
            ->route('listarADM');
    }
    public function listar()
    {
        $user_id = Auth::id();
        $preventivas = DB::table('preventivas')
            ->where('user_id', '=', $user_id)
            ->orderBy('created_at', 'DESC')
            ->orderBy('status')
            ->simplePaginate(30);
        return view('listar', ['preventivas'=>$preventivas]);
    }

    public function pesquisaPreventiva(Request $req)
    {
        $user_id = Auth::id();
        $search = $req->get('valorPesquisado');

        $preventivas = DB::table('preventivas')
            ->where('instancia', 'like', '%' . $search . '%')
            ->where('user_id', '=', $user_id)
            ->orderBy('created_at')
            ->simplePaginate(30);
        return view('listar', ['preventivas' => $preventivas]);
    }

    public function listarADM()
    {
        $user = User::find(Auth::id());
        $cluster = $user->cluster;

        $preventivas = DB::table('preventivas')
            ->where('cluster', 'like', $cluster)
            ->orderBy('created_at', 'DESC')
            ->orderBy('status', 'DESC')
            ->simplePaginate(35);
        return view('listar', ['preventivas'=>$preventivas]);
    }

    public function listarAbertos()
    {
        $user = User::find(Auth::id());
        $cluster = $user->cluster;

        $preventivas = DB::table('preventivas')
            ->where('status', '=', 'Aberto')
            ->where('cluster', 'like', $cluster)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(35);
        return view('listar', ['preventivas'=>$preventivas]);
    }

    public function listarPendentes()
    {
        $user = User::find(Auth::id());
        $cluster = $user->cluster;
        $preventivas = DB::table('preventivas')
            ->where('status', '=', 'Pendente')
            ->where('cluster', 'like', $cluster)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(35);
        return view('listar', ['preventivas'=>$preventivas]);
    }

    public function pesquisaPreventivaADM(Request $req)
    {
        $search = $req->get('valorPesquisado');

        $preventivas = DB::table('preventivas')
            ->where('instancia', 'like', '%' . $search . '%')
            ->orderBy('created_at')
            ->simplePaginate(30);
        return view('listar', ['preventivas' => $preventivas]);
    }

    public function trocaSenha(){
        return view('trocaSenha');
    }

    public function confirmaTrocaSenha(Request $request)
    {
        $usuario = Auth::user();

        $usuario->password = bcrypt(Request('password'));
        $usuario->save();   

        return view('home');
    }


}
