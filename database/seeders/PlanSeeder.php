<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Plan::create([
      'name' => 'Basic Plan',
      'description' => 'This plan can include services such as online tutoring for one subject, homework help, and test preparation for students of all grades.',
      'price' => 200,
      'input_id' => 'basicOption'
    ]);

    Plan::create([
      'name' => 'Golden Plan',
      'description' => 'This plan can include services such as online tutoring for multiple subjects, homework help, test preparation, and study skills for students of all grades. You can also offer college application assistance and career counseling.',
      'price' => 400,
      'input_id' => 'standardOption'
    ]);

    Plan::create([
      'name' => 'Platinum Plan',
      'description' => 'This plan can include services such as online tutoring for multiple subjects, homework help, test preparation, study skills, college application assistance, and career counseling for students of all grades. You can also offer personalized learning plans and progress reports.',
      'price' => 1000,
      'input_id' => 'enterpriseOption'
    ]);
  }
}
