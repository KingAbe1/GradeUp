<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('user_name');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('email')->unique();
      $table->string('phone_number')->unique();
      $table->string('profile_photo_url')->nullable();
      $table->string('school_name');
      $table->string('grade');
      $table->string('region');
      $table->string('plan');
      $table->string('plan_trail');
      $table->string('password');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
