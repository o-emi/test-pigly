<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'now_weight' => [
                'required',
                'regex:/^\d{1,4}(\.\d{1})?$/'
            ],
            'target_weight' => [
                'required',
                'regex:/^\d{1,4}(\.\d{1})?$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'now_weight.required' => '現在の体重を入力してください。',
            'now_weight.regex' => '体重は４桁までの数字で入力してください。小数点は１桁までです。',

            'target_weight.required' => '現在の身長を入力してください。',
            'target_weight.regex' => '身長は４桁までの数字で入力してください。小数点は１桁までです。',

        ];
    }
}
