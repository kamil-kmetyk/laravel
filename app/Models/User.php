<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
  use HasApiTokens, HasFactory, Notifiable;

  public const APP_USER_MAIL = 'app-user@example.com';

  protected $fillable = [ 'name', 'email', 'password' ];
  protected $hidden = [ 'password', 'remember_token' ];
  protected $casts = [ 'email_verified_at' => 'datetime' ];

  public function role(): HasOne {
    return $this->hasOne(Role::class);
  }

  public static function registrationRules(): array {
    return [
      [
        'email' => 'required|email|unique:users,email',
        'password' => [ 'required', 'confirmed', Password::defaults() ],
        'password_confirmation' => 'required',
      ],
      [
        'email.required' => __('Pole "E-Mail" jest wymagane.'),
        'email.email' => __('Wartość pola "E-Mail" nie jest poprawnym adresem e-mail.'),
        'email.unique' => __('Wskazany adres e-mail jest już zarejestrowany.'),

        'password.*' => __('Pole "Hasło" jest wymagane. Powinno ono zawierać co najmniej 1 cyfrę i literę oraz składać się z minimum 6 znaków.'),
        'password_confirmation.required' => __('Pole "Powtórz hasło" jest wymagane.'),
      ],
    ];
  }

  public static function loginRules(): array {
    return [
      [
        'email' => 'required|email',
        'password' => 'required',
      ],
      [
        'email.required' => __('Pole "E-Mail" jest wymagane.'),
        'email.email' => __('Wartość pola "E-Mail" nie jest poprawnym adresem e-mail.'),
        'password.*' => __('Pole "Hasło" jest wymagane. Powinno ono zawierać co najmniej 1 cyfrę i literę oraz składać się z minimum 6 znaków.'),
      ],
    ];
  }

  public static function editRules(): array {
    return [
      [
        'email' => 'required|email|unique:users,email',
        'password' => [ 'nullable', 'confirmed', Password::defaults() ],
        'password_confirmation' => 'nullable',
        'role' => sprintf('required|in:%s', join(',', Role::getSelectableRoles())),
      ],
      [
        'email.required' => __('Pole "E-Mail" jest wymagane.'),
        'email.email' => __('Wartość pola "E-Mail" nie jest poprawnym adresem e-mail.'),
        'email.unique' => __('Wskazany adres e-mail jest już zarejestrowany.'),
        'password.*' => __('Hasło zawierać co najmniej 1 cyfrę i literę oraz składać się z minimum 6 znaków.'),
        'role.*' => __('Nie można nadać wybranej roli.'),
      ],
    ];
  }

}
