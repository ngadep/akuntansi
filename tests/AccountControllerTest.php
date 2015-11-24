<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_redirect_to_login_if_not_authenticated()
    {
        $this->visit('/accounts')
            ->see('Sign In');

        $this->visit('/accounts/create')
            ->see('Sign In');
    }
}
