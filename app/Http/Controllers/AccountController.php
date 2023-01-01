<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AccountController extends Controller {
  public function index(): View {
    $user = Auth::user();
    return view('account.account', compact('user'));
  }

  public function edit(Request $request): RedirectResponse {
    $user = Auth::user();
    $validation = User::editRules();
    $validation[0]['email'] .= ','.$user->id;
    unset($validation[0]['role']);
    $data = $request->validate($validation[0], $validation[1]);

    if (!is_null($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else {
      unset($data['password']);
    }

    $user->update($data);

    return redirect()->route('account')->with('success', __('Dane zostały pomyślnie zmienione.'));
  }

}
