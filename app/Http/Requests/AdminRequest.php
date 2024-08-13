<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $adminId = $this->route('admin');

        return [
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $adminId,
            'username' => 'required|max:100|unique:admins,username,' . $adminId,
            'password' => $adminId ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
        ];
    }
}