<?php

namespace Tests\Feature\Books;

use Tests\TestCase;

class UserBooksTest extends TestCase
{
    public function testBooksMainPageNoBooks()
    {
        $this->createEnvironment(true);
        $response = $this->get('/books');
        $response->assertStatus(200);
    }

    public function testBooksSecondPageNoBooks()
    {
        $this->createEnvironment(true);
        $response = $this->get('/books?page=2');
        $response->assertStatus(200);
    }
}
