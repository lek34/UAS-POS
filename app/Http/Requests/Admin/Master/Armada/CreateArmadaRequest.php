<?php

namespace App\Http\Requests\Admin\Master\Armada;

use Illuminate\Foundation\Http\FormRequest;

class CreateArmadaRequest extends FormRequest
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
            'plat' => 'required|unique:armadas,plat|max:100',
            'merk' => 'required|max:100',
            'alias' => 'nullable|max:150',
        ];
    }
}
