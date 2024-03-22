<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CandidatoEditRequest;
use App\Http\Requests\CandidatoRequest;
use App\Models\Area;
use App\Models\Candidato;
use App\Models\Experiencia;
use App\Models\Formacao;
use App\Models\Ferramentas;
use App\Models\Habilidades;
use App\Models\Linguas;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $candidato = auth()->user()->candidato;
        $candidaturas = $candidato->candidaturas()->paginate(3);
        return view('candidato_dash', compact('candidato', 'candidaturas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('candidato.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    public function store(CandidatoRequest $request)
    {
        if (Gate::allows('isCandidato')) {
            $candidato = Candidato::create([
                'user_id' => auth()->user()->id,
                'sobre' => $request->sobre,
                'area' => $request->area,
            ]);

            $cont = $request->cursando != null ?
                count($request->cursando) : 0;


            for ($i = 0; $i < $cont; $i++) {
                $candidato->formacaos()->create([
                    'instituto' => $request->instituto[$i],
                    'tipo' => $request->tipo[$i],
                    'curso' => $request->curso[$i],
                    'cursando' => $request->cursando[$i],
                ]);
            }



            $cont = $request->trabalhando != null ?
                count($request->trabalhando) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->experiencias()->create([
                    'empresa' => $request->empresa[$i],
                    'descricao' => $request->descricao[$i],
                    'trabalhando' => $request->trabalhando[$i],
                    'funcao' => $request->funcao[$i],
                ]);
            }



            $cont = $request->ferramenta != null ?
                count($request->ferramenta) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->ferramentas()->create([
                    'nome_f' => $request->ferramenta[$i],
                    
                ]);
            }

            $cont = $request->habilidade != null ?
                count($request->habilidade) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->habilidades()->create([
                    'nome_h' => $request->habilidade[$i],
                    
                ]);
            }

            $cont = $request->nivel != null ?
                count($request->nivel) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->linguas()->create([
                    'nome_l' => $request->nome_l[$i],
                    'nivel' => $request->nivel[$i],
                    
                ]);
            }

            return redirect('dashboard')->with('message', 'Cadastro feito!');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * 
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Candidato  $candidato
     * 
     */
    public function edit(Candidato $candidato)
    {
        if (Gate::allows('isCandidato') && Gate::allows('candidato_create')) {
            return view('candidato.edit', compact('candidato'));
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Models\Candidato
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CandidatoEditRequest $request, Candidato $candidato)
    {
        if (Gate::allows('isCandidato') && Gate::allows('candidato_create')) {
            $candidato->update([
                'sobre' => $request->sobre,
                'area' => $request->area,

            ]);

            if ($request->formacaoExists) {
                foreach ($request->formacaoExists as $key => $value) {

                    $formacao = Formacao::find($key);
                    if ($formacao) {
                        $formacao->update([
                            'instituto' => $value[0],
                            'curso' => $value[1],
                            'tipo' => $value[2],
                            'cursando' => $value[3],
                            'candidato_id' => auth()->user()->candidato->id,
                        ]);
                    }
                }
            }

            $cont = $request->cursando != null ?
                count($request->cursando) : 0;


            for ($i = 0; $i < $cont; $i++) {
                $candidato->formacaos()->create([
                    'instituto' => $request->instituto[$i],
                    'tipo' => $request->tipo[$i],
                    'curso' => $request->curso[$i],
                    'cursando' => $request->cursando[$i],
                ]);
            }

            if ($request->experienciaExists) {
                foreach ($request->experienciaExists as $key => $value) {

                    $experiencia = Experiencia::find($key);
                    if ($experiencia) {
                        $experiencia->update([
                            'descricao' => $value[0],
                            'empresa' => $value[1],
                            'trabalhando' => $value[2],
                            'funcao' => $value[3],
                            'candidato_id' => auth()->user()->candidato->id,
                        ]);
                    }
                }
            }

            $cont = $request->trabalhando != null ?
                count($request->trabalhando) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->experiencias()->create([
                    'empresa' => $request->empresa[$i],
                    'descricao' => $request->descricao[$i],
                    'trabalhando' => $request->trabalhando[$i],
                    'funcao' => $request->funcao[$i],
                ]);
            }


            if ($request->ferramentasExists) {
                foreach ($request->ferramentasExists as $key => $value) {

                    $ferramentas = Ferramentas::find($key);
                    if ($ferramentas) {
                        $ferramentas->update([
                            'nome_f' => $value[0],
                            'candidato_id' => auth()->user()->candidato->id,
                        ]);
                    }
                }
            }

            $cont = $request->ferramenta != null ?
                count($request->ferramenta) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->experiencias()->create([
                    'nome_f' => $request->ferramenta[$i],
                   
                ]);
            }


            if ($request->habilidadesExists) {
                foreach ($request->habilidadesExists as $key => $value) {

                    $habilidades = Habilidades::find($key);
                    if ($habilidades) {
                        $habilidades->update([
                            'nome_h' => $value[0],
                            'candidato_id' => auth()->user()->candidato->id,
                        ]);
                    }
                }
            }

            $cont = $request->habilidade != null ?
                count($request->habilidade) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->experiencias()->create([
                    'nome_h' => $request->habilidade[$i],
                   
                ]);
            }


            if ($request->linguasExists) {
                foreach ($request->linguasExists as $key => $value) {

                    $linguas = Linguas::find($key);
                    if ($linguas) {
                        $linguas->update([
                            'nome_l' => $value[0],
                            'nivel' => $value[1],
                            'candidato_id' => auth()->user()->candidato->id,
                        ]);
                    }
                }
            }

            $cont = $request->nivel != null ?
                count($request->nivel) : 0;

            for ($i = 0; $i < $cont; $i++) {
                $candidato->experiencias()->create([
                    'nome_l' => $request->nome_h[$i],
                    'nivel' => $request->nivel[$i],
                ]);
            }

            return redirect()->route('dashboard')->with('message', 'Perfil atualizado!');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Candidato  $candidato
     */
    public function destroy(Candidato $candidato)
    {
        if (Gate::allows('isCandidato') && Gate::allows('candidato_create')) {
            if ($candidato->curriculo) {
                unlink("storage/{$candidato->curriculo}");
            }

            $candidato->delete();

            return redirect()->route('dashboard');
        } else {
            return back();
        }
    }

    public function perfil(string $id)
    {
        $candidato = Candidato::find($id);
        $user = Auth::user();
        return view('candidato_perfil', compact('candidato', 'user'));
    }

    public function perfis(string $id)
    {
        $candidato = Candidato::find($id);
        $user = Auth::user();
        return view('candidato_perfil', compact('candidato', 'user'));
    }

    public function curriculo(string $id)
    {
        $candidato = Candidato::find($id);

        $pdf = Pdf::loadView('curriculo_pdf', compact('candidato'));

        return $pdf->setPaper('a4')->stream($candidato->user->name);
    }
}
