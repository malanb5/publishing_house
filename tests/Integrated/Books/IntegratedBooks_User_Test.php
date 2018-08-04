<?php

namespace Tests\Integrated\Books;

use Tests\TestCaseIntegrated;

class IntegratedBooks_User_Test extends TestCaseIntegrated
{
    /**
     * Positive
     */

    public function testBooksMainPageBooksEmpty()
    {
        $this->createEnvironment(true);
        $this->visit('/books')
            ->seePageIs('/books')
            ->see('No book yet');
    }

    public function testBooksSecondPageBooksEmpty()
    {
        $this->createEnvironment(true);
        $this->visit('/books?page=2')
            ->seePageIs('/books?page=2')
            ->see('No book yet');
    }

    public function testBooksMainPageBooksExist()
    {
        $this->createEnvironment(true, true);
        $this->visit('/books')
            ->seePageIs('/books')
            ->see("Harry Potter and the Philosopher's Stone");
    }
}
