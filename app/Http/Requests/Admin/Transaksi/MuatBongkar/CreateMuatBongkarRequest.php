<?php

namespace App\Http\Requests\Admin\Transaksi\MuatBongkar;

use Illuminate\Foundation\Http\FormRequest;

class CreateMuatBongkarRequest extends FormRequest
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
            'no' => 'required',
            'supir_id' => 'required',
            'armada_id' => 'required',
            'tableData1' => 'required',
            'tableData2' => 'required',
            'muat' => 'required',
            'bongkar' => 'required',
            'susut' => 'required',
            'potsusut' => 'required',
            'ongkos' => 'required',
            'pph' => 'required',
        ];
    }
}
