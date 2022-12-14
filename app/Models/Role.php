<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model {
  public const ROLE_ROOT = 'root';
  public const ROLE_ADMIN = 'admin';
  public const ROLE_MOD = 'mod';
  public const ROLE_USER = 'user';

  protected $fillable = ['user_id', 'role'];

  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }

  public static function getPossibleRoles(): array {
    return [Role::ROLE_ROOT, Role::ROLE_ADMIN, Role::ROLE_MOD, Role::ROLE_USER];
  }

  public static function validationRules(): array {
    return [
      [
        'user_id' => 'required|exists:users,id',
        'role' => sprintf('required|string|in:%s', join(',', static::getPossibleRoles() )),
      ],
      [
        'user_id.*' => __('Do nadania roli konieczne jest wskazanie użytkownika.'),
        'role.*' => __('Wybrano nieprawidłową rolę.ssss'),
      ],
    ];
  }

}
