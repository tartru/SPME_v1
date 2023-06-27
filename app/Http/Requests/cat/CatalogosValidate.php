<?php

namespace App\Http\Requests\cat;

use Illuminate\Foundation\Http\FormRequest;

class CatalogosValidate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:25|number',
            'email' => 'require|email|unique:users',
            'password' => 'require|min:6',
        ]);

        if ($validator->fails()){
             return response()->json([
                 'success' => false,
                 'errors' => $validator->errors()->toArray()
             ]);
        }
           return response()->json([
                'success' => true
              ]);
        }

        return [
            'valor' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ];
    }
}
