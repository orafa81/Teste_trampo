<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidaturaRequest;
use App\Models\Candidatura;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CandidaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(CandidaturaRequest $request)
    {
        if (Gate::allows('isCandidato')) {
            Candidatura::create([
                'vaga_id' => $request->vaga_id,
                'candidato_id' => auth()->user()->candidato->id,
            ]);

            // $candidatosVaga = Vaga::findOrFail($request->vaga_id);
            // $candidatosVaga ->increment('candidaturas');

            
            return redirect()->route('dashboard')->with('message', 'Candidaturar realizada!');

        } else {
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidatura  $candidatura
     * 
     */
    public function show(Candidatura $candidatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidatura  $candidatura
     */
    public function edit(Candidatura $candidatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidatura  $candidatura
     * 
     */
    public function update(Request $request, Candidatura $candidatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidatura  $candidatura
     * 
     */
    public function destroy(Candidatura $candidatura)
    {
        if (Gate::allows('isCandidato') && Gate::allows('candidato_create')) {
            $candidatura->delete();

            return redirect()->route('dashboard')->with('message', 'Candidatura cancelada!');
        } else {
            return back();
        }
    }
}
