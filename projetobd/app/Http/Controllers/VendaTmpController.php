<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendaTmp;
use App\Models\Cliente;
use App\Models\Produto;

class VendaTmpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendatmp = VendaTmp::with('cliente')->get();
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:
        //$produto = Produto::with('categoria')->with('vendedor')->get();
        return view('vendatmp.index', compact('vendatmp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = Cliente::all();
        return view('vendatmp.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id', // Valida que o cliente existe
            'nome_funcionario' => 'required|string|max:255',
            'total' => 'required|numeric',
        ]);

        // Criação de uma nova venda temporária
        VendaTmp::create([
            'cliente_id' => $request->cliente_id,
            'nome_funcionario' => $request->nome_funcionario,
            'total' => $request->total,
        ]);

        // Redireciona para a lista de vendas temporárias
        return redirect()->route('vendatmp.index')->with('success', 'Venda criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendatmp = VendaTmp::with('cliente')->findOrFail($id);
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:
        //$produto = Produto::with('categoria')->with('vendedor')->findOrFail($id);
        return view('vendatmp.show', compact('vendatmp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendatmp = VendaTmp::with('cliente')->findOrFail($id);
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:
        //$produto = Produto::with('categoria')->with('vendedor')->findOrFail($id);
        $cliente = Cliente::all();
        return view('vendatmp.edit', compact('vendatmp', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendatmp = VendaTmp::findOrFail($id);
        $vendatmp->update($request->all());
        return redirect('/vendatmp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendatmp = VendaTmp::findOrFail($id);
        $vendatmp->delete();
        return redirect('/vendatmp');
    }
}
