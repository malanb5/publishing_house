<?php

namespace Tests\Integrated;

use Tests\TestCaseIntegrated;

class IntegratedHttpTest extends TestCaseIntegrated
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
}
