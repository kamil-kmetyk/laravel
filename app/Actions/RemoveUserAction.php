<?php

namespace App\Actions;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use LaravelViews\Views\View;

class RemoveUserAction extends Action {
  use Confirmable;

  public $icon = 'user-x';

  public function __construct() {
    $this->title = __('Usuń');
    parent::__construct();
  }

  public function renderIf( $item, View $view ): bool {
    if ((Auth::user()->can('is-root') || Auth::user()->can('is-admin')) && !in_array($item->role->role, [Role::ROLE_APP, Role::ROLE_ROOT])) {
      return true;
    }

    return false;
  }

  public function handle( $model, View $view ): void {
    if (Auth::user()->can('is-user') || in_array($model->role->role, [ Role::ROLE_APP, Role::ROLE_ROOT ]) || $model->id === Auth::user()->id) {
      $this->error('Nie można usunąć wybranego użytkownika.');
      return;
    }

    if (Auth::user()->can('is-mod') && Role::ROLE_ADMIN === $model->role->role) {
      $this->error('Nie można usunąć wybranego użytkownika.');
      return;
    }

    $model->delete();
    $this->success('Użytkownik usunięty.');
  }

  public function getConfirmationMessage( $model = null ): string {
    return __('Czy na pewno chcesz usunąć użytkownika?');
  }

}
