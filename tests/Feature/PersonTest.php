<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        Person::factory()->count(3)->create();

        $response = $this->get('/persons');

        $response->assertStatus(200);
        $response->assertViewHas('persons', function ($persons) {
            return 3 === $persons->count();
        });
    }

    public function test_create(): void
    {
        $response = $this->get('/persons/create');

        $response->assertStatus(200);
        $response->assertSee('Add New Person');
    }

    public function test_store(): void
    {
        $response = $this->post('/persons', [
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'sally@example.com',
            'tel' => '123123123',
            'sms_sub' => 'on',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('people', [
            'email' => 'sally@example.com',
        ]);
    }

    public function test_show(): void
    {
        $person = Person::factory()->create([
            'email' => 'sally@example.com',
        ]);

        $response = $this->get("/persons/$person->id");

        $response->assertStatus(200);
        $response->assertSee('sally@example.com');
    }

    public function test_edit(): void
    {
        $person = Person::factory()->create([
            'email' => 'sally@example.com',
        ]);

        $response = $this->get("/persons/$person->id/edit");

        $response->assertStatus(200);
        $response->assertSee('sally@example.com');
    }

    public function test_update(): void
    {
        Person::factory()->count(3)->create();
        $person = Person::factory()->create([
            'email' => 'sally@example.com',
        ]);

        $response = $this->put("/persons/$person->id", [
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'sally2@example.com',
            'tel' => '123123123',
            'sms_sub' => 'on',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('people', [
            'email' => 'sally2@example.com',
        ]);
    }

    public function test_destroy(): void
    {
        $person = Person::factory()->create([
            'email' => 'sally@example.com',
        ]);

        $response = $this->delete("/persons/$person->id");

        $response->assertRedirect();
        $this->assertDatabaseMissing('people', [
            'email' => 'sally@example.com',
        ]);
    }
}
