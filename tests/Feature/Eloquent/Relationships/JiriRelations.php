<?php

use App\Enums\ContactRoles;
use App\Models\User;

test('jiri has many students', function () {

    $user = User::factory()->create();

    $jiri = $user->jiris()->create([
        'name' => 'Jiri name',
        'starting_at' => now()
    ]);

    $contact = $user->contacts()->create([
        'name' => 'Stacy',
        'email' => 'stacy@test.com',
        'user_id' => $user->id
    ]);

    $jiri->students()->attach($contact->id, ['role' => ContactRoles::Student->value]);
    $jiri->evaluators()->attach($contact->id, ['role' => ContactRoles::Evaluator->value]);

    expect($jiri->students)->toHaveCount(1)->and($jiri->contacts)->toHaveCount(2);

});
