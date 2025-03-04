<?php

namespace App\Http\Controllers;

use App\Http\Requests\InforRequest;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\User;
use App\Models\Telefone;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $estado = Estado::where('nome', $request->estado)->first();

        if (!$estado) {

            $estado = Estado::create([
                'nome' => $request->estado,
            ]);
        }

        $cidade = Cidade::where('cep', $request->cep)->first();


        if (!$cidade) {

            $cidade = Cidade::create([
                'nome' => $request->cidade,
                'cep' => $request->cep,
                'estado_id' => $estado->id,
            ]);
        }

        $user->endereco()->update([
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'cidade_id' => $cidade->id,
        ]);

        $user->telefones()->update([
            'celular' => $request->celular,
            'fixo' => $request->fixo,
        ]);

        return redirect('/dashboard')->with('message', 'Informações atualizadas!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('dashboard');
    }

    public function tipoConta()
    {
        $user = User::find(auth()->user()->id);

        return view('formCadastro', compact('user'));
    }

    public function setTipoConta(Request $request)
    {
        if ($request->option == 1) {
            $tipo = "candidato";
        } else if ($request->option == 2) {
            $tipo = "empresa";
        } else {
            return response()->json(["Erro" => "Selecione um tipo de conta"], 500);
        }
        $user = User::find(auth()->user()->id);
        $user->update([
            'tipo_conta' => $tipo
        ]);

        return response()->json(["Sucesso" => $user], 200);
    }

    public function setSexo(Request $request)
    {
        if ($request->option == 1) {
            $sexo = "masculino";
        } else if ($request->option == 2) {
            $sexo = "feminino";
        } else {
            return response()->json(["Erro" => "Selecione o seu gênero"], 500);
        }
        $user = User::find(auth()->user()->id);
        $user->update([
            'sexo' => $sexo
        ]);

        return response()->json(["Sucesso" => $user], 200);
    }

    public function setTelecon(Request $request)
    {
        
        if ($request->option == 1) {
            $telecon = "sim";
        }
        else if ($request->option == 2) {
            $telecon = "não";
        } else {
            return response()->json(["Erro" => "Selecione o uma opção válida"], 500);
        }

        $user = User::find(auth()->user()->id);
        $user->update([
            'is_telecon' => $telecon
        ]);

        return response()->json(["Sucesso" => $user], 200);
    }

    public function informationStore(InforRequest $request)
    {

        $user = User::find(auth()->user()->id);


        $estado = Estado::where('nome', $request->estado)->first();


        if (!$estado) {

            $estado = Estado::create([
                'nome' => $request->estado,
            ]);
        }

        $cidade = Cidade::where('cep', $request->cep)->first();


        if (!$cidade) {

            $cidade = Cidade::create([
                'nome' => $request->cidade,
                'cep' => $request->cep,
                'estado_id' => $estado->id,
            ]);
        }

        $endereco = $user->endereco()->create([
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'cidade_id' => $cidade->id,
        ]);

        $user->update([
            'endereco_id' => $endereco->id,
        ]);

        $user->telefones()->create([
            'celular' => $request->celular,
            'fixo' => $request->fixo,
        ]);

    
        if ($request->perfil ) {
            
            $user->update([
                'perfil' => $request->perfil->store('perfis'),
            ]);
        } else {
            $user->update([
                'perfil' => 'imagens/perfilDefalt.png',
            ]);
        }
        
        return redirect(route('dashboard'))->with('message', 'Cadastro feito!');
    }
}
