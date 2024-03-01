<?php

namespace App\Http\Requests\Admin\Transaksi\KontrakJual;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKontrakJualRequest extends FormRequest
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
        $id  = $this->route('id');
        return [
            'tanggal' => 'required',
            'no' => 'required|unique:kontrak_juals,no,'.$id,
            'supplier_id' => 'required',
            'kg' => 'required',
            'harga' => 'required',
            'ppnpercentage' => 'required',
        ];
    }
}
