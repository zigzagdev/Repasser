<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
//    絶対的にValidationが必要な時にここに記載する。

    public function rules()
    {
        return [
            'h_alpha_num'        => 'h_alpha_num',
            'f_hira'             => 'f_hira',
            'h_alpha_num_note'   => 'h_alpha_num_note',
            'postal'             => 'postal',
            'tel_mobile'         => 'tel_mobile',


        ];
    }
//
//    とある条件下の時にここに記載する。(例えば、flag == 1 の時だけ等)
    public function withValidator($validator) {


        $validator->sometimes('','',function ($input){
            return ;
        });


        $validator->sometimes('','',function ($input){
            return ;
        });


        $validator->sometimes('','',function ($input){
            return ;
        });


        $validator->sometimes('','',function ($input){
            return ;
        });


        $validator->sometimes('','',function ($input){
            return ;
        });
    }
}
