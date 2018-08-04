<?php

namespace Tests\Feature\Books;

use Tests\TestCase;

class GuestBooksTest extends TestCase
{
    public function testBooksMainPageNoBooks()
    {
        $response = $this->get('/books');
        $response->assertStatus(302);
    }

    public function testBooksSecondPageNoBooks()
    {
        $response = $this->get('/books?page=2');
        $response->assertStatus(302);
    }
}
