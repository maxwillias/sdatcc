<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinalProjectRequest extends FormRequest
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
            'aluno' => 'string',
            'orientador' => 'string',
            'curso' => 'string',
            'titulo' => 'string',
            'palavras_chave' => 'string',
            'resumo' => 'string',
            'data_publicacao' => 'date',
            'arquivo' => 'required|file|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'arquivo.mimes' => 'O arquivo precisa ser do tipo PDF.',
        ];
    }
}
