<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'question_text' =>'required|min:3|max:100',
            'correct_answer' =>'required|max:50',
            'incorrect_answer1' =>'required|max:50',
            'incorrect_answer2' =>'required|max:50',
            'incorrect_answer3' =>'required|max:50',

        ];
    }
}