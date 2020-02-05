<?php

namespace App\Http\Controllers;

use App\Preventiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Exports\PreventivasExports;
use Maatwebsite\Excel\Facades\Excel;

class BaController extends Controller
{

    public function solicitacao() 
    {
        return view('BA/solicitacao');
    }

}
