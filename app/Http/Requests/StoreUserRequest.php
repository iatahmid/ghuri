<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
            //
        //'name' => 'required',
        //'ContactNumber' => 'required',
        //'gender' => 'required',
        //'email' => 'required| email',
        // 'password' => 'required',
         //'password_confirmation' => 'required| same: password'
         //'password_confirmation' =>   'required| same: password',
        ];
    }
}
