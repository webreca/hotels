<?php

namespace App\Http\Requests\Customer\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class SubmitOTPRequest extends FormRequest
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
            'phone'             => ['required', 'phone:US,IN,UK,SG'],
            'otp_digit_1'       => ['required'],
            'otp_digit_2'       => ['required'],
            'otp_digit_3'       => ['required'],
            'otp_digit_4'       => ['required'],
        ];
    }
}
