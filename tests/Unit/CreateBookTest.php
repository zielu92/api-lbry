<?php

namespace Tests\Unit;

use App\Models\Author;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateBookTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function test_can_create_book(): void
    {

        $user   = User::factory()->create();
        $author = Author::factory()->create();
        $token  = $user->createToken('test-token')->plainTextToken;

        $response = $this->postJson('/api/books', [
            'title'      => 'The Great Gatsby',
            'author_ids' => [$author->id]
        ], ['Authorization' => "Bearer $token"]);

        $response->assertStatus(201)
                ->assertJsonPath('data.title', 'The Great Gatsby');
    }
}
