<?php

namespace App\Http\Requests\Admin\Transaksi\Payment\KontrakJual;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentKontrakJualRequest extends FormRequest
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
            //
            'tanggal' => 'required',
            'kontrak_jual_id' => 'required',
            'totalbayar' => 'required',
        ];
    }
}
