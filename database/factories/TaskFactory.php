<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskPriority;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{

    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(4), // Genera un título único con 4 palabras
            'description' => fake()->paragraph(3), // Genera un párrafo de 3 oraciones
            'deadline' => fake()->dateTimeBetween('now', '+1 year'),
            'status_id' => TaskStatus::inRandomOrder()->first()->id,
            'priority_id' => TaskPriority::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
