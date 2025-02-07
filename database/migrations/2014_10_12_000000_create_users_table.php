<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up() {
    Schema::create('users', function ( Blueprint $table ) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
    });
  }

  public function down() {
    Schema::dropIfExists('users');
  }

};
