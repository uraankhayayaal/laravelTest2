<?php

namespace Tests\Feature;

use App\Models\Book;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    public function test_create()
    {
        $faker = Factory::create();
        $bookTitle = $faker->sentence;

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST', '/api/books', ['title' => $bookTitle]);

        $response
            ->assertStatus(201)
            ->assertJsonPath('data.title', $bookTitle);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $book = Book::factory()->hasAuthors(3)->create();

        $response = $this->get('/api/books/'.$book->id);

        $response
            ->assertStatus(200)
            ->assertJsonPath('data.title', $book->title);
    }
}
