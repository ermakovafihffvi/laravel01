<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:30', 'not_regex:/^\s+/'],
            'slug' => ['required', 'min:5', 'max:30','not_regex:/^\s+/'],
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Заполните :attribute',
            'title.min' => 'Название слишком короткое(',
            'title.max' => 'Название слишком длинное(',
            'title.not_regex' => 'Название не должно начинаться с пробела',

            'slug.required' => 'Заполните :attribute',
            'slug.min' => 'Слаг слишком короткий(',
            'slug.max' => 'Слаг слишком длинный(',
            'slug.not_regex' => 'Слаг не должен начинаться с пробела'

        ];
    }

    public function attributes(){
        return[
            'title' => 'заголовок',
            'slug' => 'слаг',
        ];
    }
}
