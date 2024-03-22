<?php

namespace App\Http\Controllers;

use App\Http\Requests\VagaRequest;
use App\Models\Area;
use App\Models\Candidatura;
use App\Models\Requisito;
use App\Models\Beneficio;
use App\Models\Responsabilidade;
use App\Models\Vaga;
use App\Models\Vinculo;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {

        // $vagas = Vaga::inRandomOrder()->take(4)->get();
        // $user = Auth::user();
        // return view('welcome', compact('vagas', 'user'));
    }

    public function listarVagas(Request $request)
    {
        $orderBy = $request->input('orderBy');
        
        $vagas = Vaga::when(request('titulo') != null, function($query){
            return $query->where('titulo', 'like', '%' . 'titulo' . '%');
        });
        

        if($orderBy == 1){
            $vagas = Vaga::latest()->paginate(6);
        } else{
            $vagas = Vaga::paginate(6);
        }


        
        $user = Auth::user();
        return view('listarVagas', compact('vagas', 'user'));
        
    }

    public function candidaturas(Vaga $vaga)
    {
       
        $candidaturas = $vaga->candidaturas()->paginate(8);
        $user = Auth::user();
        return view('listarCandidaturas', compact('candidaturas', 'user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        // $areas = Area::all();
        return view('cadastrar_vaga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(VagaRequest $request)
    {
        if (Gate::allows('isEmpresa') && Gate::allows('empresa_create')) {

            $vinculo = Vinculo::where('nome', $request->vinculo)->first();

            if (!$vinculo) {
                $vinculo = Vinculo::create([
                    'nome' => $request->vinculo,
                ]);
            }
           
            $vaga = Vaga::create([
                'empresa_id' => auth()->user()->empresa->id,
                'empresa' => auth()->user()->empresa,
                'titulo' => $request->titulo,
                'hierarquia' => $request->hierarquia,
                'salario' => $request->salario,
                'descricao' => $request->descricao,
                'area' => $request->area,
                'vinculo_id' => $vinculo->id,
            ]);
           
            $qtdResponsabilidades = $request->responsabilidade != null ?
                count($request->responsabilidade) : 0;

            for ($i = 0; $i < $qtdResponsabilidades; $i++) {
                $vaga->responsabilidades()->create([
                    'titulo' => $request->responsabilidade[$i],
                ]);
            }

            $qtdRequisitos = $request->requisito != null ?
                count($request->requisito) : 0;

            for ($i = 0; $i < $qtdRequisitos; $i++) {
                $vaga->requisitos()->create([
                    'titulo' => $request->requisito[$i],
                ]);
            }

            $qtdBeneficios = $request->beneficio != null ?
                count($request->beneficio) : 0;

            for ($i = 0; $i < $qtdBeneficios; $i++) {
                $vaga->beneficios()->create([
                    'titulo' => $request->beneficio[$i],
                ]);
            }

            return redirect('dashboard')->with('message', 'Vaga criada!');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     
     */
    public function show(Vaga $vaga, Empresa $empresa)
    {
        
        
        $user = Auth::user();
        //$empresa = Empresa::find($id);
        return view('vaga', compact('vaga', 'empresa', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     
     */
    public function edit(Vaga $vaga)
    {
        return view('editVaga', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaga  $vaga

     */
    public function update(VagaRequest $request, Vaga $vaga)
    {
        if (Gate::allows('isEmpresa') && Gate::allows('empresa_create')) {
            $vinculo = Vinculo::where('nome', $request->vinculo)->first();

            if (!$vinculo) {
                $vinculo = Vinculo::create([
                    'nome' => $request->vinculo,
                ]);
            }

            $vaga->update([
                'titulo' => $request->titulo,
                'hierarquia' => $request->hierarquia,
                'salario' => $request->salario,
                'descricao' => $request->descricao,
                'vinculo_id' => $vinculo->id,
            ]);

            if ($request->responsabilidadeExists) {
                foreach ($request->responsabilidadeExists as $key => $value) {

                    $responsabilidade = Responsabilidade::find($key);
                    if ($responsabilidade) {
                        $responsabilidade->update([
                            'titulo' => $value[0],
                        ]);
                    }
                }
            }

            $qtdResponsabilidades = $request->responsabilidade != null ?
                count($request->responsabilidade) : 0;

            for ($i = 0; $i < $qtdResponsabilidades; $i++) {
                $vaga->responsabilidades()->create([
                    'titulo' => $request->responsabilidade[$i],
                ]);
            }

            if ($request->requisitoExists) {
                foreach ($request->requisitoExists as $key => $value) {

                    $requisito = Requisito::find($key);
                    if ($requisito) {
                        $requisito->update([
                            'titulo' => $value[0],
                        ]);
                    }
                }
            }

            $qtdRequisitos = $request->requisito != null ?
                count($request->requisito) : 0;

            for ($i = 0; $i < $qtdRequisitos; $i++) {
                $vaga->requisitos()->create([
                    'titulo' => $request->requisito[$i],
                ]);
            }


            if ($request->beneficioExists) {
                foreach ($request->beneficioExists as $key => $value) {

                    $beneficio = Beneficio::find($key);
                    if ($beneficio) {
                        $beneficio->update([
                            'titulo' => $value[0],
                        ]);
                    }
                }
            }

            $qtdBeneficios = $request->beneficio != null ?
                count($request->beneficio) : 0;

            for ($i = 0; $i < $qtdBeneficios; $i++) {
                $vaga->beneficios()->create([
                    'titulo' => $request->beneficio[$i],
                ]);
            }



            return redirect()->route('dashboard')->with('message', 'Vaga atualizada!');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaga  $vaga
     */
    public function destroy(Vaga $vaga)
    {
        if (Gate::allows('isEmpresa') && Gate::allows('empresa_create')) {
            $vaga->delete();

            return redirect()->route('dashboard')->with('message', 'Vaga excluída!');
        } else {
            return back();
        }
    }
}
