<?php

namespace Tests\Integrated\Books;

use Tests\TestCaseIntegrated;

class IntegratedBooksGuestTest extends TestCaseIntegrated
{
    /**
     * Positive
     */

    public function testBooksMainPageBooksEmpty()
    {
        $this->visit('/books')
            ->seePageIs('/login');
    }

    public function testBooksSecondPageBooksEmpty()
    {
        $this->visit('/books?page=2')
            ->seePageIs('/login');
    }

}
