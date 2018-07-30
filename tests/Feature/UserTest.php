<?php
namespace Tests\Feature;
use Tests\TestCase;

class UserTest extends TestCase
{
    private $url = '/api/auth/';

    public function testGetUserData()
    {
        $this->json('get', $this->url.'me', [], $this->headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                ],
            ])
        ;
    }
}