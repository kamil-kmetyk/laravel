<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void {
    Schema::create('settings', function (Blueprint $table) {
      $table->id();
      $table->string('key', 512)->unique();
      $table->text('value')->nullable();
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
    });
  }

  public function down(): void {
    Schema::dropIfExists('settings');
  }

};
