<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller {
  public function login(): View {
    $setting = Setting::getValue(Setting::REGISTRATION_ACTIVE);
    return view('auth.login', compact('setting'));
  }

  public function loginSubmit(LoginRequest $request): RedirectResponse {
    $request->authenticate();
    $request->session()->regenerate();

    return redirect()->route('dashboard');
  }

  public function registration(): View|RedirectResponse {
    $setting = Setting::getValue(Setting::REGISTRATION_ACTIVE);

    if (!$setting) {
      return redirect()->route('login');
    }

    return view('auth.registration');
  }

  public function registrationSubmit(Request $request): RedirectResponse {
    $setting = Setting::getValue(Setting::REGISTRATION_ACTIVE);

    if (!$setting) {
      return redirect()->route('login');
    }

    $validation = User::validationRules();
    $data = $request->validate($validation[0], $validation[1]);

    $user = User::create([ 'email' => $data['email'], 'password' => Hash::make($data['password']) ]);

    event(new Registered($user));

    return redirect()->route('login');
  }

  public function logout(Request $request): RedirectResponse {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
  }

}
