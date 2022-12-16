<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider {
  public function register() {}

  public function boot() {
    Password::defaults(function () {
      return Password::min(6)->letters()->numbers();
    });
  }

}
