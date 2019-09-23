<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $validate = [
            'email' => 'required|' . (!empty($this->id) ? '' : 'unique:employees|') .'max:100',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'company_id' => 'required',
        ];

        if (!empty($this->phone)) {
            $validate['phone'] = 'required';
        }

        return $validate;
    }
}
