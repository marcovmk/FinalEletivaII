<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class DashboardController extends Controller
{

    public function gerarGrafico(){
        $data = Produto::select('categoria_id', DB::raw('AVG(valor) as valor_medio'))
                        ->with('categoria')
                        ->groupBy('categoria_id')
                        ->get();
        $categorias = [];
        $valores_medios = [];

        foreach($data as $linha){
            $categorias[] = $linha->categoria->nome;
            $valores_medios[] = $linha->valor_medio;
        }
        return view('dashboard', compact('categorias', 'valores_medios'));

    }
    
}
