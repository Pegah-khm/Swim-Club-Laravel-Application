<?php

namespace Database\Factories;

use App\Models\Squad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingPerformance>
 */
class TrainingPerformanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'squad_id' => Squad::inRandomOrder()->value('id'),
            'performance_date' => $this->faker->date,
            'distance' => $this->faker->randomFloat(2, 25, 400),
            'time' => $this->faker->time,
            'stroke' => $this->faker->randomElement(['freestyle', 'backstroke', 'breaststroke', 'butterfly']),
            'event' => $this->faker->word,
        ];
    }
}
