<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'user_id' => User::factory(),
      // 'user_id' => function () {
      //   return User::factory()->create()->id;
      // }
      'title' => $this->faker->realText(20),
      'body' => $this->faker->realText(100),
      'updated_at' => $this->faker->dateTimeBetween('-10days', '0days'),
    ];
  }
}
