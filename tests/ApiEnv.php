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

    public function createEnvironment($login=false)
    {
        $this->removeEnvironment();
        $this->user = User::create([
            'name' => $this->userName,
            'email' => $this->userMail,
            'password' => bcrypt($this->userPassword),
        ]);

        if ($login) {
            $this->be(User::where('id', '=', $this->user->id)->first());
        }
    }
    private function removeEnvironment()
    {
        if ($this->user) {
            User::where('id', $this->user->id)->delete();
            $this->user = null;
        }
    }
}