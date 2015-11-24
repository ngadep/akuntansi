<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_redirect_to_login_if_not_authenticated()
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

    public function test_can_create_user_and_relation_with_company()
    {
        $user = factory(Akuntansi\User::class)->create([
            'email' => 'admin_test@akuntansi.com'
        ]);

        $user->companies()->save(factory(Akuntansi\Models\Company::class)
                ->create(['user_id'=>$user->id]));

        $this->seeInDatabase('users',['email' => 'admin_test@akuntansi.com'])
            ->seeInDatabase('companies',['user_id'=>$user->id]);
    }
}
