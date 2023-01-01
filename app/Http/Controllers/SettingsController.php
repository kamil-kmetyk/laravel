<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller {
  public function index(): View {
    $settings = [];
    $model = Setting::all()->toArray();

    foreach ($model as $setting) {
      $settings[$setting['key']] = $setting['value'];
    }

    return view('settings', compact('settings'));
  }

  public function save(Request $request): RedirectResponse {
    $data = $request->validate(Setting::validationRules()[0], Setting::validationRules()[1]);

    $data[Setting::REGISTRATION_ACTIVE] = $request->get(Setting::REGISTRATION_ACTIVE, false);

    foreach ($data as $setting => $value) {
      Setting::where('key', $setting)->update([ 'value' => $value ]);
    }

    return redirect()->route('settings')->with('success', __('Ustawienia zostały pomyślnie zapisane.'));
  }

}
