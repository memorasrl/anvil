<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @throws Exception
     */
    public function authorize(): bool {
        throw new Exception('This method must be implemented in the child class.');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @throws Exception
     */
    public function rules(): array {
        throw new Exception('This method must be implemented in the child class.');
    }

    /**
     * Handle a failed validation attempt returning structured error response.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     */
    public function failedValidation($validator) {
        throw new ValidationException($validator);
    }
}
