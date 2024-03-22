<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string'],
            'vinculo' => ['required', 'string', 'max:3'],
            'area' => ['required', 'string'],
            'hierarquia' => ['required', 'string'],
            'salario' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'responsabilidade' => ['array'],
            'requisito' => ['array'],
            'beneficio' => ['array'],
            'responsabilidadeExists' => ['array'],
            'requisitoExists' => ['array'], 
            'beneficioExists' => ['array'], 
                
        ];
    }
}
