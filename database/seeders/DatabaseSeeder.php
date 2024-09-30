<?php

namespace Database\Seeders;

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
        User::factory(10)
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(5), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create();

        User::factory()
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(5), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create([
            'name' => 'Marvin',
            'email' => 'marvinpagnoul@icloud.com',
            'password' => 'Marvin1234@'
        ]);
    }
}
