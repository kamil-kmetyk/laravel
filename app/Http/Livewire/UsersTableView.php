<?php

namespace App\Http\Livewire;

use App\Actions\RemoveUserAction;
use App\Models\Role;
use App\Models\User;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;

class UsersTableView extends TableView {
  public $searchBy = ['email'];
  public $sortBy = 'id';

  protected $model = User::class;

  public function headers(): array {
    return [
      Header::title('ID')->sortBy('id'),
      Header::title(__('E-Mail'))->sortBy('email'),
      Header::title(__('Rola')),
      Header::title(__('Utworzenie konta'))->sortBy('created_at'),
    ];
  }

  public function row(User $model): array {
    return [
      $model->id,
      $model->email,
      UI::badge(Role::translateRole($model->role->role)),
      $model->created_at,
    ];
  }

  protected function actionsByRow(): array {
    return [
      new RedirectAction('users.edit', __('Edytuj'), 'edit-3'),
      new RemoveUserAction,
    ];
  }

}
