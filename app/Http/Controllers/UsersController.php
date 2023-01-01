<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsersController extends Controller {
  public function index(): View {
    return view('users.users');
  }

  public function edit(User $user): View {
    return view('users.edit', compact('user'));
  }

  public function doEdit(Request $request, User $user): RedirectResponse {
    $validation = User::editRules();
    $validation[0]['email'] .= ','.$user->id;

    $data = $request->validate($validation[0], $validation[1]);

    if (!is_null($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else {
      unset($data['password']);
    }

    $user->fill($data);
    $user->role->role = $data['role'];
    $user->push();

    return redirect()->route('users.edit', ['user' => $user->id])->with('success', __('Konto zostało zaktualizowane.'));
  }

}
