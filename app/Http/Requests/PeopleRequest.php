<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'birth_date'  => 'date_format:Y-m-d|before:today',
            'cpf_or_cnpj'  => ['required','min:14', Rule::unique('people')->ignore(app('request')->segment(2))],
            'rg'  => 'required|min:5',
            'marital_status'  => 'required',
            'cep'  => 'required|min:9',
            'address'  => 'required',
            'neighborhood'  => 'required',
            'city'  => 'required',
            'state'  => 'required',
            'phone_type'  => 'required',
            'phone_number'  => 'required|min:14',
            'number'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'birth_date.before' => 'Digite uma data válida',
            'name.min' => 'Digite uma nome válido',
            'cpf_or_cnpj.min' => 'Digite um CPF ou CNPJ válido',
            'cpf_or_cnpj.unique' => 'Este CPF/CNPJ já consta em nossos registros',
            'marital_status.required'  => 'Selecione um estado civil',
            'cep.min'  => 'Digite um CEP válido',
            'address.required'  => 'Informe um CEP válido',
            'neighborhood.required'  => 'Informe um CEP válido',
            'city.required'  => 'Informe um CEP válido',
            'state.required'  => 'Informe um CEP válido',
            'phone_type.required'  => 'Selecione o tipo de telefone',
            'phone_number.min'  => 'Digite um número de telefone válido',
        ];

    }
}
