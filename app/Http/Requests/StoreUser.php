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
            'emailRegister' => 'required|unique:App\Models\User,email|same:repeatEmail|pattern:/[a-zA-Z0-9_\-\.\+]+\@[a-zA-Z0-9-]+\.[a-zA-Z]+/',
            'repeatEmail' => 'required',
            'passwordRegister' => 'required|same:repeatPasswordRegister|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'repeatPasswordRegister' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
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
            'emailRegister.unique' => 'The email is already registered',
            'emailRegister.pattern' => 'The mail is not well formatted',
            'emailRegister.same' => 'Emails do not match',
            'passwordRegister.required' => 'Dont leave the password empty',
            'passwordRegister.same' => 'Passwords do not match',
            'passwordRegister.pattern' => 'The password is not well formatted',
            'repeatPasswordRegister.required' => 'Dont leave the repeat password empty',
            'repeatPasswordRegister.pattern' => 'The repeat password is not well formatted',
            'telephone.required' => 'Dont leave the telephone empty',
            'address.required' => 'Dont leave the address empty',
        ];
    }
}
