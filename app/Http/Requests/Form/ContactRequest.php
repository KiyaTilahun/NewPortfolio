<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',

        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a valid string.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',

            'last_name.string' => 'The last name must be a valid string.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',

            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',

            'phone_number.string' => 'The phone number must be a valid string.',
            'phone_number.max' => 'The phone number may not be greater than 20 characters.',

            'subject.string' => 'The subject must be a valid string.',
            'subject.max' => 'The subject may not be greater than 255 characters.',

            'message.required' => 'The message is required.',
            'message.string' => 'The message must be a valid string.',
        ];
    }

    // protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    // {
    //     throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
    //         'success' => false,
    //         'message' => 'Validation failed.',
    //         'errors' => $validator->errors(),
    //     ], 422));
    // }
}
