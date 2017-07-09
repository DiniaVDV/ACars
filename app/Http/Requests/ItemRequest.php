<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'alias' => 'required',
            'code' => 'required|numeric',
            'price' => 'required|numeric',
//            'image' => 'present|image',
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
            'name.required'  => 'Поле название не можеть быть пустым.',
            'alias.required'  => 'Поле псевдоним не можеть быть пустым.',
            'code.required'  => 'Поле код не можеть быть пустым.',
            'price.required'  => 'Поле цена не можеть быть пустым.',
//            'image.image'  => 'Добавить можна только картинку(jpeg, png, bmp, gif, или svg).',
        ];
    }
}
