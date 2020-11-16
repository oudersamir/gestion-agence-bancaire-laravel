<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        return ['nom'=>'required|min:5'
        ,'prenom' =>'required|min:5|max:200'
        ,'cin' =>'required|min:7|max:10'
        ,'telephone '=>'numeric|min:10|max:10'
        ,'adresse' =>'required|min:20|max:200'
        ,'email' =>'email|required|min:10|max:200'];
    }
}
