<?php

namespace Database\Seeders;

use App\Enums\ContactRoles;
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
                $this->createAttendances($user, $jiri);
                $this->createAssignements($user, $jiri);
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
            $this->createAttendances($marvin, $jiri);
            $this->createAssignements($marvin, $jiri);
        });
    }

    private function createAttendances($user, $model): void
    {
        $user->contacts->random(5)->each(function ($contact) use ($model) {
            $role = random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value;
            $model->contacts()->attach($contact, ['role' => $role, 'token' => $role == ContactRoles::Evaluator->value ? bin2hex(random_bytes(50)) : null]);
        });
    }

    private function createAssignements($user, $model): void
    {
        $user->projects->random(2)->each(function ($project) use ($model) {
            $model->projects()->attach($project);
        });
    }
}
