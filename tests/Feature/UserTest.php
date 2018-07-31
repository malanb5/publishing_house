<?php
namespace Tests\Feature;
use Tests\ApiEnv;
use Tests\TestCase;

class UserTest extends TestCase
{
    use ApiEnv;

    public function testMainPage()
    {
        $this->createEnvironment(true);
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testHomePage()
    {
        $this->createEnvironment(true);
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $this->createEnvironment(true);
        $response = $this->get('/login');
        $response->assertStatus(302);
    }

    public function testRegisterPage()
    {
        $this->createEnvironment(true);
        $response = $this->get('/register');
        $response->assertStatus(302);
    }

    public function testLogoutPage()
    {
        $this->createEnvironment(true);
        $response = $this->get('/logout');
        $response->assertStatus(302);
    }
}