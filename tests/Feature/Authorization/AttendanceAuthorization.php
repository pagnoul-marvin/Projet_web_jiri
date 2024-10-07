<?php

use App\Enums\ContactRoles;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\patch;

beforeEach(function () {
    $this->user1 = User::factory()
        ->has(
            Jiri::factory()
                ->count(1)
                ->hasAttached(
                    Contact::factory()
                        ->count(1)
                        ->state(function (array $attributes, Jiri $jiri): array {
                            return ['user_id' => $jiri->user_id];
                        }),
                    fn() => ['role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value]
                )
        )
        ->create();

    $this->user2 = User::factory()
        ->has(
            Jiri::factory()
                ->count(1)
                ->hasAttached(
                    Contact::factory()
                        ->count(1)
                        ->state(function (array $attributes, Jiri $jiri): array {
                            return ['user_id' => $jiri->user_id];
                        }),
                    fn() => ['role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value]
                )
        )
        ->create();

    actingAs($this->user1);
});

test('a user can\'t modify an attendance that an other user owns', function () {

    $other_attendance = $this->user2->attendances->first();

    $response = patch(route('attendance.update', $other_attendance));

    $response->assertStatus(403);
});
