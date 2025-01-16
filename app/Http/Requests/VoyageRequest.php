<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VoyageRequest extends FormRequest
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
            'date_voyage' => 'required|date',
            'heure_depart' => 'required|date_format:H:i',
            'trajet_id' => 'required|exists:trajets,id'
        ];
    }

    public function messages()
    {
        return [
            'date_voyage.required' => 'Ce champ est requis.',
            'heure_depart.required' => 'Ce champ est requis.',
            'trajet_id.required' => 'Ce champ est requis.',
            'date_voyage.date' => 'Veuillez respectez le format de la date.',
            'heure_depart.date_format' => "Veuillez respectez le format de l'heure.",
            'trajet_id.exists' => "Le trajet choisi n'existe pas. Veuillez le créer.",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()));
    }
}
