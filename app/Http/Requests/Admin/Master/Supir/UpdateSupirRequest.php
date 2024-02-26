<?php

namespace App\Http\Requests\Admin\Master\Supir;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupirRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'nama' => 'required|unique:supirs,nama,'. $id .'|max:100',
            'no_sim' => 'required|max:100',
            'no_ktp' => 'required|max:255',
        ];
    }
}
