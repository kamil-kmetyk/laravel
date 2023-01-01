<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Role extends Model {
  public const ROLE_ROOT = 'root';
  public const ROLE_ADMIN = 'admin';
  public const ROLE_MOD = 'mod';
  public const ROLE_USER = 'user';
  public const ROLE_APP = 'app';

  protected $fillable = ['user_id', 'role'];

  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }

  public static function getPossibleRoles(): array {
    return [Role::ROLE_ROOT, Role::ROLE_ADMIN, Role::ROLE_MOD, Role::ROLE_USER, Role::ROLE_APP];
  }

  public static function getSelectableRoles(): array {
    $roles = [Role::ROLE_MOD, Role::ROLE_USER];

    if (Auth::user()->can('is-root') || Auth::user()->can('is-admin')) {
      $roles[] = Role::ROLE_ADMIN;
    }

    return $roles;
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

  public static function translateRole(string $role): string {
    return match($role) {
      static::ROLE_ROOT => __('root'),
      static::ROLE_ADMIN => __('administrator'),
      static::ROLE_MOD => __('moderator'),
      static::ROLE_USER => __('użytkownik'),
      static::ROLE_APP => __('aplikacja'),
    };
  }

}
