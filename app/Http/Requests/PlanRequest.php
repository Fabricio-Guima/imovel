<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->segment(2);

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:50', "unique:plans,name,{$id},id"],
            'stripe_id' => ['required', 'string', "unique:plans,stripe_id,{$id},id"],
            'price' => ['required', 'min:0'],
            'description' => ['nullable', 'string', 'min:3', 'max:1000'],
        ];

        if ($this->method() == 'PUT') {
            $rules['stripe_id'] = ['nullable', 'string'];
        }

        return $rules;
    }
}
