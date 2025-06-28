<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RacePerformance>
 */
class RacePerformanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'swimmer')->inRandomOrder()->value('id'),
            'squad_id' => Squad::inRandomOrder()->value('id'),
            'event_id' => Event::factory(),
            'race_date' => $this->faker->date,
            'distance' => $this->faker->randomFloat(2, 25, 400),
            'time' => $this->faker->time,
        ];
    }
}
