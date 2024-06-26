<?php

namespace App\Http\Requests\Admin\Master\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');

        return [
            //
            'nama' => 'required|unique:suppliers,nama,'. $id .'|max:100',
            'alias' => 'required|max:100',
            'alamat' => 'required|max:255',
            'email' => 'required|max:100',
            'notelp' => 'required|max:15',
        ];
    }
}
