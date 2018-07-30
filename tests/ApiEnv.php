<?php

namespace Tests;
use App\Models\User;
use JWTAuth;

trait ApiEnv
{
    public $user = null;
    public $userName = 'John';
    public $userPassword = '123456';
    public $userMail = 'johnr.doe@test.com';
    public $headers = null;
    public $token = null;

    public function createEnvironment($role = 'admin')
    {
        $this->removeEnvironment();
        $this->user = User::create([
            'name' => $this->userName,
            'email' => $this->userMail,
            'password' => bcrypt($this->userPassword),
        ]);
        $this->token = JWTAuth::attempt(['email' => $this->userMail, 'password' => $this->userPassword,]);
        $this->headers = ['Authorization' => 'Bearer '.$this->token];
    }
    private function removeEnvironment()
    {
        if ($this->user) {
            User::where('id', $this->user->id)->delete();
            $this->user = null;
        }
    }
}