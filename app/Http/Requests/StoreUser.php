<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'emailRegister' => 'required|unique:App\Models\User,email',
            'passwordRegister' => 'required|min:8',
            'repeatPasswordRegister' => 'required|min:8',
            'telephone' => 'required',
            'address' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Dont leave the name empty',
            'surname.required' => 'Dont leave the Surname empty',
            'emailRegister.required' => 'Dont leave the email empty',
            'passwordRegister.required' => 'Dont leave the passwordRegister empty',
            'repeatPasswordRegister.required' => 'Dont leave the repeatPasswordRegister empty',
            'telephone.required' => 'Dont leave the telephone empty',
            'address.required' => 'Dont leave the address empty',
        ];
    }
}
