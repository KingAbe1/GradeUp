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
    Schema::create('teachers', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users', 'id');
      $table->string('multiStepsTeachBefore')->nullable();
      $table->string('grade')->nullable();
      $table->string('multiStepsSchool')->nullable();
      $table->string('grade_future')->nullable();
      $table->string('choice_education')->nullable();
      $table->string('educational_level')->nullable();
      $table->string('graduation_subject')->nullable();
      $table->string('uni_coll_name')->nullable();
      $table->string('up_temp')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('teachers');
  }
};