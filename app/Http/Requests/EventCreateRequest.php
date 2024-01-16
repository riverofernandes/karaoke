<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EventCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<string>|string>
     */
    public function rules(): array
    {
        return [
            'title'            => 'required',
            'location'         => 'min:3',
            'description'      => 'min:3',
            'start_date_event' => 'date',
            'end_date_event'   => 'date',
            'start_time'       => 'timezone',
            'end_time'         => 'timezone',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string>
     */
    public function messages()
    {
        return [
            'required' => ':attribute é obrigatório',
            'integer'  => ':attribute deve ser inteiro',
            'min'      => ':attribute deve ter no minimo 3 caracteres',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'erro de validação',
            'data'    => $validator->errors(),
        ]));
    }
}
