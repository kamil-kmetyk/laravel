<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
  protected $policies = [];

  public function boot() {
    $this->registerPolicies();
    $this->createGates();
  }

  protected function createGates(): void {
    Gate::define('is-root', function (User $user) {
      return Role::ROLE_ROOT === $user->role->role;
    });

    Gate::define('is-admin', function (User $user) {
      return Role::ROLE_ADMIN === $user->role->role;
    });

    Gate::define('is-mod', function (User $user) {
      return Role::ROLE_MOD === $user->role->role;
    });

    Gate::define('is-user', function (User $user) {
      return Role::ROLE_USER === $user->role->role;
    });
  }

}
