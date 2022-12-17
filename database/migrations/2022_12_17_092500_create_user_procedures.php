<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
  public function up(): void {
    DB::unprepared('
      CREATE OR REPLACE FUNCTION create_user_relations() RETURNS TRIGGER AS $new$
      BEGIN
        INSERT INTO roles (user_id) VALUES (NEW.id);
        RETURN NEW;
      END;
      $new$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER user_after_insert_trigger AFTER INSERT on users
      FOR EACH ROW EXECUTE PROCEDURE create_user_relations();
    ');
  }

  public function down(): void {}

};
