<?php

namespace App\Http\Requests\Rule;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRuleRequest extends FormRequest
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

   /* protected function prepareForValidation()
    {
        $this->merge([
            'query_string' => substr($this->query_string, 0, 1) == '/' ?
                str_
        ]);
    }*/


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display' =>'required|in:1,0',
            'rule_id' => 'required|exists:rules,id',
            'alert_message' => 'required',
            'query_string' => 'required'
        ];
    }
}
