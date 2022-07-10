<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
            'plan_id' => ['nullable', 'exists:plans,id'],
            'status' => ['boolean'],
            'isCnpj' => ['boolean'],
            'cnpj' => ['required', 'string', 'min:11', 'max:14', "unique:tenants,cnpj,{$id},id"],
            'name' => ['required', 'min:3', 'max:30', "unique:tenants,name,{$id},id"],
            'email' => ['required', 'email', "unique:tenants,email,{$id},id"],
            'logo' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            'phone' => ['nullable', 'string', 'min:9', 'max:11'],
            'whatsapp' => ['nullable', 'string', 'min:9', 'max:11'],
            'telegram' => ['nullable', 'string', 'min:9', 'max:11']
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'status' => ['boolean'],
                'isCnpj' => ['boolean'],
                'cnpj' => ['nullable', 'string', 'min:11', 'max:14', "unique:tenants,cnpj,{$id},id"],
                'name' => ['nullable', 'min:3', 'max:30', "unique:tenants,name,{$id},id"],
                'email' => ['nullable', 'email', "unique:tenants,email,{$id},id"]
            ];
        }

        return $rules;
    }
}
