<?php


namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users|max:255|string',
            'username' => 'required|string|max:255',
            'password' => 'required|confirmed|min:8',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'role' => 'required|string',
            'birth_date' => 'nullable|date'
        ];
    }
}
