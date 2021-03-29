<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestRequest extends FormRequest
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
            'guestsid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'activity' => 'required',
            // 'noRack' => 'required',
            // 'noLoker' => 'required',
            'telephone' => 'required|numeric'
        ];
    }

    //pesan error
    public function messages()
    {
        return [
            'guestsid.required' => 'guestsid harus diisi',
            'name.required' => 'name harus diisi',
            'email.required' => 'email harus diisi',
            'activity.required' => 'activity harus diisi',
            // 'noRack.required' => 'noRack harus diisi',
            // 'noLoker.required' => 'noLoker harus diisi',
            'telephone.required' => 'telephone harus diisi',
        ];
    }
}
