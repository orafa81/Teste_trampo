<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sobre' => ['required', 'string'],
            'area' => ['required', 'string'],
            'instituto' => ['array'],
            'curso' => ['array'],
            'tipo' => ['array'],
            'cursando' => ['array'],
            'descricao' => ['array'],
            'empresa' => ['array'],
            'trabalhando' => ['array'],
            'funcao' => ['array'],
            'ferramentas' => ['array'],
            'habilidades' => ['array'],
            'nome_l' => ['array'],
            'nivel' => ['array'],
            'formacaoExists' => ['array'],
            'experienciaExists' => ['array'],
            'ferramentasExists' => ['array'],
            'habilidadesExists' => ['array'],
            'linguasExists' => ['array'],
        ];
    }
}
