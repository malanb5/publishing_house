<?php

namespace Tests;
use App\Models\Author;
use App\Models\User;
use App\Models\Book;
use JWTAuth;

trait ApiEnv
{
    public $user = null;
    public $userName = 'John';
    public $userPassword = '123456';
    public $userMail = 'johnr.doe@test.com';

    public $book = null;
    public $bookName = "Harry Potter and the Philosopher's Stone";
    public $bookDescription = "Harry Potter and the Philosopher's Stone is a fantasy novel written by British author J. K. Rowling. The first novel in the Harry Potter series and Rowling's debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to the Hogwarts School of Witchcraft and Wizardry. Harry makes close friends and a few enemies during his first year at the school, and with the help of his friends, Harry faces an attempted comeback by the dark wizard Lord Voldemort, who killed Harry's parents, but failed to kill Harry when he was just 15 months old. ";
    public $bookImage = "https://upload.wikimedia.org/wikipedia/en/6/6b/Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg";
    public $bookPublished_at = "1999-08-16";

    public function createEnvironment($login=false, $createBook=false, $bookCount = 0)
    {
        $this->removeEnvironment();

        $this->createUser();
        $this->createBooks($createBook, $bookCount);

        if ($login) {
            $this->be(User::where('id', '=', $this->user->id)->first());
        }
    }
    private function removeEnvironment()
    {
        User::truncate();
        Book::truncate();

        if ($this->user) {$this->user = null;}
        if ($this->book) {$this->book = null;}
    }

    private function createUser(){
        $this->user = User::create([
            'name' => $this->userName,
            'email' => $this->userMail,
            'password' => bcrypt($this->userPassword),
        ]);
    }

    /**
     * @param bool $createBook
     * @param int $bookCount
     */
    private function createBooks(bool $createBook, int $bookCount){
        if($createBook){
            factory(Author::class)->create();
            factory(Book::class)->create([
                'name' => $this->bookName,
                'description' => $this->bookDescription,
                'image' => $this->bookImage,
                'published_at' => $this->bookPublished_at,
            ]);
            factory(Book::class, $bookCount)->create();
        }
    }
}