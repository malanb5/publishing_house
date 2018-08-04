<?php

namespace Tests\Integrated;

use Tests\TestCaseIntegrated;

class IntegratedLoginTest extends TestCaseIntegrated
{
    /**
     * Positive
     */

    public function testLoginExistUser()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('johnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }

    /**
     * Negative
     */

    public function testLoginNotExistUser()
    {
        $this->visit('/login')
            ->type('notjohnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records.')
        ;
    }

    public function testLoginExistUserNotValidPassword()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('johnr.doe@test.com', 'email')
            ->type('1234567', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records.')
        ;
    }

    public function testLoginExistUserEmptyName()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('The email field is required.')
        ;
    }

    public function testLoginExistUserEmptyPassword()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('johnr.doe@test.com', 'email')
            ->type('', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('The password field is required.')
        ;
    }

    public function testLoginExistUserEmptyNameAndEmptyPassword()
    {
        $this->createEnvironment(false);
        $this->visit('/login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('The email field is required.')
            ->see('The password field is required.')
        ;
    }
}
