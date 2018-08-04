<?php

namespace Tests\Integrated;

use Tests\TestCaseIntegrated;

class IntegratedRegisterTest extends TestCaseIntegrated
{
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

    public function testRegisterExistUser()
    {
        $this->createEnvironment(false);
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('johnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The email has already been taken.')
        ;
    }

    public function testRegisterAllFieldsIsEmpty()
    {
        $this->visit('/register')
            ->type('', 'name')
            ->type('', 'email')
            ->type('', 'password')
            ->type('', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The password field is required.')
        ;
    }

    public function testRegisterNotExistUserEmptyName()
    {
        $this->visit('/register')
            ->type('', 'name')
            ->type('johnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The name field is required.')
        ;
    }

    public function testRegisterNotExistUserEmptyEmail()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The email field is required.')
        ;
    }

    public function testRegisterNotExistUserEmptyPassword()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('johnr.doe@test.com', 'email')
            ->type('', 'password')
            ->type('', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The password field is required.')
        ;
    }

    public function testRegisterNotExistUserEmptyConfirmPassword()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('johnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->type('', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The password confirmation does not match.')
        ;
    }

    public function testRegisterNotExistUserNotValidConfirmPassword()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('johnr.doe@test.com', 'email')
            ->type('123456', 'password')
            ->type('654321', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The password confirmation does not match.')
        ;
    }

    public function testRegisterNotExistUserTooShortPassword()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('johnr.doe@test.com', 'email')
            ->type('12345', 'password')
            ->type('12345', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The password must be at least 6 characters.')
        ;
    }

    public function testRegisterNotExistUserNotValidEmail()
    {
        $this->visit('/register')
            ->type('new User', 'name')
            ->type('absolute_new_usertest.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The email must be a valid email address.')
        ;
        ;
    }
}
