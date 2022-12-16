<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 *
 * @mixin Builder
 */
class Setting extends Model {
  public const REGISTRATION_ACTIVE = 'registration_active';

  protected $fillable = ['key', 'value'];

  public static function getValue(string $key, mixed $default = null): mixed {
    $setting = (new static)->select('value')->where('key', '=', $key)->first();

    if (!$setting) {
      return $default;
    }

    return $setting->value;
  }

}
