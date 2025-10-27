<?php

namespace Database\Factories;

use App\Models\GroupCategory;
use App\Models\GroupPriority;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{

    protected $model = Group::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->sentence(2),
            'description' => fake()->paragraph(5),
            'category_id' => GroupCategory::inRandomOrder()->first()->id,
            'priority_id' => GroupPriority::inRandomOrder()->first()->id,
        ];
    }
}
