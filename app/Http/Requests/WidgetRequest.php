<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WidgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required','regex:/^\+[1-9]\d{1,14}$/'],
            'subject' => 'required|string|max:255',
            'text' => 'required|string',
            'files.*' => 'nullable|file|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Телефон должен быть в формате E.164, например +380XXXXXXXXX',
            'files.*.max' => 'Каждый файл не должен превышать 10 MB',
        ];
    }
}
