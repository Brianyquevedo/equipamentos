<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Equipamento;

class EquipamentoController extends Controller
{
    public function criar() 
    {
        return view('criar')->with([]);
    }

    public function inserir(Request $request)
    {
        $mensagem = [
            'required' => 'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'nome' => 'required',
            'marca' => 'required',
            'modelo' => 'required'
        ], $mensagem);

        try {
            Equipamento::create([
                'nome' => $request->get('nome'),
                'marca' => $request->get('marca'),
                'modelo' => $request->get('modelo'),
                'observacao' => $request->get('observacao') ? $request->get('observacao') : null,
                'usuario' => Auth::user()->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('create', 'Equipamento adicionado com sucesso!');
    }

    public function editar($id)
    {
        $equipamento = Equipamento::where("id", $id)->get();

        if ($equipamento->isEmpty()) {
            return redirect()->route('home')->with('resposta', [
                'status' => 400,
                'mensagem' => 'Acesso negado!'
            ]);
        }

        return view("editar")->with([
            "equipamento"=>$equipamento[0]
        ]);
    }

    public function atualizar(Request $request, $id)
    {
        $mensagem = [
            'required' => 'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'nome' => 'required',
            'marca' => 'required',
            'modelo' => 'required'
        ], $mensagem);

        try {
            Equipamento::find($id)->update([
                'nome' => $request->get('nome'),
                'marca' => $request->get('marca'),
                'modelo' => $request->get('modelo'),
                'observacao' => $request->get('observacao') ? $request->get('observacao') : null
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('update', 'Equipamento atualizado com sucesso!');
    }

    public function excluir($id)
    {
        try {
            Equipamento::find($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('delete', 'Equipamento excluído com sucesso!');
    }
}
