<?php

namespace Tests\Feature;

use App\Models\Author;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $faker = Factory::create();
        $authorTitle = $faker->title;

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST', '/api/authors', ['title' => $authorTitle]);

        $response
            ->assertStatus(201)
            ->assertJsonPath('data.title', $authorTitle);
    }
}
