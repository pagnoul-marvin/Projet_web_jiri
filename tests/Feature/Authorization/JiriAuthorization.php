<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->user1 = User::factory()->hasJiris(1)->create();
    $this->user2 = User::factory()->hasJiris(1)->create();
});

test('a user can only see its Jiris on the index page', function () {
    actingAs($this->user1);

    $jiri1 = $this->user1->jiris()->first();
    $jiri2 = $this->user2->jiris()->first();

    $response = get(route('jiri.index'));

    $response->assertSee($jiri1->name);
    $response->assertDontSee($jiri2->name);
});

test('a user can\'t see a jiri that an other user owns' , function () {
    actingAs($this->user1);

    $other_jiri = $this->user2->jiris()->first();

    $response = get(route('jiri.show', $other_jiri));

    $response->assertStatus(403);
});

test('a user can\'t edit a jiri that an other user owns' , function () {
    actingAs($this->user1);

    $other_jiri = $this->user2->jiris()->first();

    $response = get(route('jiri.edit', $other_jiri));

    $response->assertStatus(403);
});
