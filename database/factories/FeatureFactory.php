<?php

namespace Database\Factories;

use App\Enums\FeatureEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "Title of the feature",
            'description' => "Quod provident in similique in hic ut. Amet quis quo rerum possimus reprehenderit eaque voluptas. Tempore.",
            "icon" => "fa-bolt",
            "status" => fake()->randomElement(['active','deactive']),
        ];
    }
}
