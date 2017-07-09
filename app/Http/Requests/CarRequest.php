<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
			// 'alias' => 'required',
			'brand' => 'required',
			'model' => 'required',
			'engine' => 'required',
			'year_began_id' => 'required',
			'year_ended_id' => 'required',
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
			// 'alias.required' => 'Поле псевдоним пустое',
			'brand.required' => 'Поле марка пустое',
			'model.required' => 'Поле модель пустое',
			'engine.required' => 'Поле объем двигателя пустое',
			'year_began_id.required' => 'Выберите начало выпуска',
			'year_ended_id.required' => 'Выберите конец выпуска',
        ];
    }
}
