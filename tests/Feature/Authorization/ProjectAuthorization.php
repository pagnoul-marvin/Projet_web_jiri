<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;

beforeEach(function () {
   $this->user1 = User::factory()->hasProjects(1)->create();
   $this->user2 = User::factory()->hasProjects(1)->create();
});

test('a user can only see its projects on the index page', function () {
    actingAs($this->user1);

    $project1 = $this->user1->projects()->first();
    $project2 = $this->user2->projects()->first();

    $response = get(route('project.index'));

    $response->assertSee($project1->name);
    $response->assertDontSee($project2->name);
});

test('a user can\'t see a project that an other user owns', function () {
    actingAs($this->user1);

    $other_project = $this->user2->projects()->first();

    $response = get(route('project.show', $other_project));

    $response->assertStatus(403);
});

test('a user can\'t edit a project that an other user owns', function () {
    actingAs($this->user1);

    $other_project = $this->user2->projects()->first();

    $response = get(route('project.edit', $other_project));

    $response->assertStatus(403);
});

test('a user can\'t update a project that an other user owns', function () {
    actingAs($this->user1);

    $other_project = $this->user2->projects()->first();

    $response = patch(route('project.update', $other_project));

    $response->assertStatus(403);
});

test('a user can\'t delete a project that an other user owns', function () {
    actingAs($this->user1);

    $other_project = $this->user2->projects()->first();

    $response = delete(route('project.destroy', $other_project));

    $response->assertStatus(403);
});
