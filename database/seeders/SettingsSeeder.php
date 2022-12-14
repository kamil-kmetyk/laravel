<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder {
  public function run() {
    Setting::insert([
      [ 'key' => Setting::REGISTRATION_ACTIVE, 'value' => 1 ],
    ]);
  }

}
