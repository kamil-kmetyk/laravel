<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
  public function authorize(): bool {
    return true;
  }

  public function rules(): array {
    return User::validationRules()[0];
  }

  public function messages(): array {
    return User::validationRules()[1];
  }

  public function authenticate(): void {
    if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
      throw ValidationException::withMessages([ 'mail' => __('Nie znaleziono konta dla podanych danych.') ]);
    }
  }

}
