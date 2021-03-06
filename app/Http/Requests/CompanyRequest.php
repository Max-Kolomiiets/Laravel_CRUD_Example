<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

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
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => [
                'required',
                'min:3',
                'max:255',
                'email',
            ],
            'phone' => 'required|min:8|max:25',
            'website' => 'required|min:5|max:30',
            'logo' => 'max:3000kb|Mimes:jpeg,jpg,gif,png| dimensions:min_width=100,min_height=100'
        ];

        

        if (!empty($this->company)) {
            $rules['email'][] = ValidationRule::unique('users')->ignore($this->company->id);

        } else {
            $rules['email'][] = ValidationRule::unique('users');
            $rules['logo'] .= '|required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'phone.required' => 'Phone is required!'
        ];
    }
}
