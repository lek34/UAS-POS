<?php

namespace App\Http\Requests\Admin\Transaksi\KontrakJual;

use Illuminate\Foundation\Http\FormRequest;

class CreateKontrakJualRequest extends FormRequest
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
            'tanggal' => 'required',
            'no' => 'required|unique:kontrak_juals,no',
            'customer_id' => 'required',
            'kg' => 'required',
            'harga' => 'required',
            'ppnpercentage' => 'required',
        ];
    }
}
