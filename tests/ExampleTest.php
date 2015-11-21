<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Sign In');
    }

    public function test_can_login()
    {
        $this->visit('/auth/login')
            ->type('admin@akuntansi.com','email')
            ->type('123','password')
            ->press('Sign In')
            ->seePageIs('/')
            ->see('Click to expand');
    }
}
