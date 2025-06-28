<?php

namespace Database\Factories;

use App\Models\Squad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                '50m Freestyle',
                '100m Freestyle',
                '200m Freestyle',
                '400m Freestyle',
                '800m Freestyle',
                '1500m Freestyle',
                '50m Backstroke',
                '100m Backstroke',
                '200m Backstroke',
                '50m Breaststroke',
                '100m Breaststroke',
                '200m Breaststroke',
                '50m Butterfly',
                '100m Butterfly',
                '200m Butterfly',
                '100m Individual Medley',
                '200m Individual Medley',
                '400m Individual Medley',
                '4x100m Freestyle Relay',
                '4x200m Freestyle Relay',
                '4x100m Medley Relay'
            ]),
            'description' => Str::limit($this->faker->sentence, 40),
            'location' => $this->faker->city,
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'squad_id' => Squad::inRandomOrder()->value('id'),
        ];
    }
}
