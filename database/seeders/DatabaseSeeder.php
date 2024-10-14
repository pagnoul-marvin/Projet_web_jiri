<?php

namespace Database\Seeders;

use App\Enums\ContactRoles;
use App\Models\Attendance;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)
            ->has(Jiri::factory()->count(5), 'jiris') // OU hasJiris(5)
            ->has(Contact::factory()->count(5), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create();
        foreach ($users as $user) {
            $user->jiris->each(function ($jiri) use ($user) {
                $user->contacts->random(5)->each(function ($contact) use ($jiri) {
                    $jiri->contacts()->attach($contact, ['role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value]);
                });

                $user->projects->random(2)->each(function ($project) use ($jiri) {
                    $jiri->projects()->attach($project);
                });
            });
        }

        $marvin = User::factory()
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(5), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create([
                'name' => 'Marvin',
                'email' => 'marvinpagnoul@icloud.com',
                'password' => 'Marvin1234@'
            ]);

        $marvin->jiris->each(function ($jiri) use ($marvin) {
            $marvin->contacts->random(5)->each(function ($contact) use ($jiri) {
                $jiri->contacts()->attach($contact, ['role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value]);
            });

            $marvin->projects->random(2)->each(function ($project) use ($jiri) {
                $jiri->projects()->attach($project);
            });
        });
    }
}
