<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user');

        return [
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,'.$userId,
            'username' => 'required|max:100|unique:users,username,'.$userId,
            'password' => $userId ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
        ];
    }
}
