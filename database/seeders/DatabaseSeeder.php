<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\RacePerformance;
use App\Models\Squad;
use App\Models\TrainingPerformance;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $squads = collect([
            Squad::create(['name' => 'Advanced A']),
            Squad::create(['name' => 'Junior B']),
            Squad::create(['name' => 'Development C']),
            Squad::create(['name' => 'Performance D']),
            Squad::create(['name' => 'Masters E']),
        ]);
        $squadIds = $squads->pluck('id');

        User::factory()->create([
            'username'  => 'club_official',
            'forename'  => 'admin',
            'surname'   => 'admin',
            'dob'       => '1988-04-08',
            'email'     => 'admin@admin.com',
            'password'  => 'Admin12345',
            'phone'     => '07932430611',
            'address'   => '16 Stoke Road',
            'postcode'  => 'ST4 2DP',
            'role'      => 'club_official',
        ]);

        User::factory()->create([
            'username'  => 'swimmer01',
            'forename'  => 'Pegah',
            'surname'   => 'Khodakarami',
            'dob'       => '1988-04-08',
            'email'     => 's1@swimmer.com',
            'password'  => 'S11111111',
            'phone'     => '07942460612',
            'address'   => '15 Leek Road',
            'postcode'  => 'ST6 1DPV',
            'role'      => 'swimmer',
            'squad_id' => '2',
        ]);

        User::factory()->create([
            'username'  => 'coach01',
            'forename'  => 'Sarah',
            'surname'   => 'Collins',
            'dob'       => '1988-03-06',
            'email'     => 'c1@coach.com',
            'password'  => 'C11111111',
            'phone'     => '07933231511',
            'address'   => '2 Balmoral Avenue',
            'postcode'  => 'ST1 4NP',
            'role'      => 'coach',
            'squad_id'  => '1',
        ]);



        $swimmers = User::factory(25)->create(['role' => 'swimmer']);

        foreach ($swimmers as $swimmer) {
            $swimmer->update([
                'squad_id' => $squadIds->random(),
            ]);
        }


        $coaches = User::factory(10)->create(['role' => 'coach']);

        foreach ($coaches as $i => $coach) {
            $squad = Squad::find($squadIds[$i % $squadIds->count()]);
            $coach->squad_id = $squad->id;
            $coach->save();

            $squad->coach_id = $coach->id;
            $squad->save();
        }


        Event::factory(3)->create();

        foreach ($swimmers as $swimmer) {
            TrainingPerformance::factory(5)->create([
                'user_id' => $swimmer->id,
                'squad_id' => $swimmer->squad_id,
            ]);
            RacePerformance::factory(5)->create(['user_id' => $swimmer->id]);
        }


    }

}
