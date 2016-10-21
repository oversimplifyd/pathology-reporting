<?php

namespace Pathology\Http\Requests;

use Pathology\Http\Requests\Request;

class StorePatientRequest extends Request
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'patient_id' => 'between:6,6 | unique:users'
        ];
    }
}
