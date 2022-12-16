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

  protected $fillable = [ 'name', 'email', 'password' ];
  protected $hidden = [ 'password', 'remember_token' ];
  protected $casts = [ 'email_verified_at' => 'datetime' ];

  public function role(): HasOne {
    return $this->hasOne(Role::class);
  }

  public static function validationRules(): array {
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

}
