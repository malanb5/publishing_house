<?php

namespace Tests\Integrated;

use Tests\TestCaseIntegrated;

class IntegratedTest extends TestCaseIntegrated
{
    public $baseUrl = 'http://localhost'; //todo add env.test


    public function testMainPage()
    {
        $this->visit('/')
            ->see('Laravel');
    }

    public function testLoginPage()
    {
        $this->visit('/login')
            ->see('Login');
    }

    public function testRegisterPage()
    {
        $this->visit('/register')
            ->see('Register');
    }

    public function testLogoutPage()
    {
        $this->visit('/logout')
            ->see('Laravel');
    }

    public function testClickLogin()
    {
        $this->visit('/')
            ->click('Login')
            ->seePageIs('/login');
    }

    public function testClickRegister()
    {
        $this->visit('/')
            ->click('Register')
            ->seePageIs('/register');
    }

    public function testLoginExistUser()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('johnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }

    public function testLoginNotExistUser()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('notjohnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records.')
        ;
    }

    public function testRegisterNotExistUser()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('absolute_new_user@test.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/home')
        ;
    }
}
