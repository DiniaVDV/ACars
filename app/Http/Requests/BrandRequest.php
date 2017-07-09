<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'country' => 'required',
//            'logo' => 'image',
        ];
    }
	
	 /**
     * Получить сообщения об ошибках для определённых правил проверки.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Необходимо написать название.',
            'country.required' => 'Необходимо указать страну.',
//            'logo.image'  => 'Добавить можна только картинку(jpeg, png, bmp, gif, или svg).',
        ];
    }
}
