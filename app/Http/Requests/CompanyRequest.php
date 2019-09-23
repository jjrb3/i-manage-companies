<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|' . (!empty($this->id)?: 'unique:companies|') .'max:60',
            'email' => 'required|email:rfc,dns|max:100',
            'logo' => 'dimensions:max_width=1000,max_height=1000',
            'website' => 'required'
        ];
    }
}
