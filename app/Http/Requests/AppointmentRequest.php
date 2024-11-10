<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'first_name' => 'required | max:255',
            'last_name' => 'required | max:255',
            'email' => 'email | required | max:255',
            'phone' => 'required | max:15 | min:10',
            'reason' => 'required',
            'first_date' => 'required',
            'first_time' => 'required',
            'second_date' => 'required',
            'second_time' => 'required',
        ];
    }
}
