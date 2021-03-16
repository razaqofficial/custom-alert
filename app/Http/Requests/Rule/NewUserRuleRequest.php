<?php

namespace App\Http\Requests\Rule;

use App\Enums\RuleType;
use BenSampo\Enum\Rules\EnumValue;
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
            'name' => ['required', new EnumValue(RuleType::class)],
            'display' =>'required|in:1,0',
            'query_string' => 'required'
        ];
    }
}
