<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'author' => ['required', 'min:2', 'max:20','not_regex:/^\s+/'],
            'text' => ['required', 'min:15', 'not_regex:/^\s+/'],
            'category_id' => ['required', 'exists:App\Models\Categories,id'],
            'image' => ['mimes:jpeg,png', 'between:35,5000', 'dimensions:min_width=200,min_height=200'],
            'isPrivate' => ['sometimes', 'in:1']
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Заполните :attribute',
            'title.min' => 'Название слишком короткое(',
            'title.max' => 'Название слишком длинное(',
            'title.not_regex' => 'Название не должно начинаться с пробела'
        ];
    }

    public function attributes(){
        return[
            'title' => 'заголовок',
            'author' => 'автор',
            'text' => 'текст',
            'category_id' => 'категория',
            'image' => 'картинка'
        ];
    }
}
