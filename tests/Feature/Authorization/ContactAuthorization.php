<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;

beforeEach(function () {
    $this->user1 = User::factory()->hasContacts(1)->create();
    $this->user2 = User::factory()->hasContacts(1)->create();
});


test('a user can only see its contacts on the index page', function () {
    actingAs($this->user1);

    $contact1 = $this->user1->contacts()->first();
    $contact2 = $this->user2->contacts()->first();

    $response = get(route('contact.index'));

    $response->assertSee($contact1->name);
    $response->assertDontSee($contact2->name);
});

test('a user can\'t view a contact that an other user owns', function () {
    actingAs($this->user1);

    $other_contact = $this->user2->contacts()->first();

    $response = get(route('contact.show', $other_contact));

    $response->assertStatus(403);
});


test('a user can\'t edit a contact that an other user owns', function () {
    actingAs($this->user1);

    $other_contact = $this->user2->contacts()->first();

    $response = get(route('contact.edit', $other_contact));

    $response->assertStatus(403);
});

test('a user can\'t update a contact that an other user owns', function () {
    actingAs($this->user1);

    $other_contact = $this->user2->contacts()->first();

    $response = patch(route('contact.update', $other_contact));

    $response->assertStatus(403);
});

test('a user can\'t delete a contact that an other user owns', function () {
    actingAs($this->user1);

    $other_contact = $this->user2->contacts()->first();

    $response = delete(route('contact.destroy', $other_contact));

    $response->assertStatus(403);
});

