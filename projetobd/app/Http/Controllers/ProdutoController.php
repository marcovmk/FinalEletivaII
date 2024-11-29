<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:
        //$produto = Produto::with('categoria')->with('vendedor')->get();
        return view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect('/produto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:
        //$produto = Produto::with('categoria')->with('vendedor')->findOrFail($id);
        return view('produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:
        //$produto = Produto::with('categoria')->with('vendedor')->findOrFail($id);
        $categorias = Categoria::all();
        return view('produto.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect('/produto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('/produto');
    }
}
