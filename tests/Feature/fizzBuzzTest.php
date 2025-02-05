<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Jobs\Publish;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Queue;

class fizzBuzzTest extends TestCase
{
    use RefreshDatabase;

    public function test_fizzBuzz(): void
    {
        $response = $this->get('/fizz-buzz?fizzBuzzNumber=10');
        $response->assertStatus(200);
        $response->assertViewHas('fizzBuzz', function ($fizzBuzz) {
            return "1 2 Fizz 4 Buzz Fizz 7 8 Fizz Buzz" === $fizzBuzz;
        });
    }

    public function test_publish(): void
    {
        Queue::fake();
        Person::factory()->create([
            'email_sub' => false,
            'sms_sub' => false,
        ]);
        Person::factory()->create([
            'email_sub' => true,
            'sms_sub' => false,
        ]);
        Person::factory()->create([
            'email_sub' => false,
            'sms_sub' => true,
        ]);

        $response = $this->post('/publish', [
            'subMessage' => 'subMessage'
        ]);

        $response->assertSuccessful();
        Queue::assertPushed(Publish::class, 2);
    }
}
