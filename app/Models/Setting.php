<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
  public const REGISTRATION_ACTIVE = 'registration_active';

  protected $fillable = ['key', 'value'];

}
