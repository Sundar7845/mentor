<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules(Request $request)
    {
        return [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|unique:users,id,'.$request->get('id'),
            'password' => 'required|confirm_password|min:6',
            'confirm_password' => 'required|same:password',
            'phonenumber' => 'nullable|min:10|numeric',
            'userrole_id' => 'required',

            'photo' => 'required',
            'title' => 'required',
            'about' => 'required',
            'experience' => 'required',
            'location' => 'required',
        ];
    }
//     protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
//     {
//             $response = new JsonResponse(['status' => 'false',
//                 'message' => implode(",",$validator->errors()->all())], 422);

//         throw new \Illuminate\Validation\ValidationException($validator, $response);
//    }
}