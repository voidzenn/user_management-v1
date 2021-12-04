<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', 'min:8'],
            'email' => ['required', 'email', 'unique:users,email,'.$this->user->id],
            'role_id' => ['required'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }
}
