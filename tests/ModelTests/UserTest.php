<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseMigrations;

    public function testUserIsPatient()
    {
        $user = factory(Pathology\User::class)->create();
        $this->assertFalse($user->isOperator(), 'User is not an operator');
    }

    public function testUserIsOperator()
    {
        $user = factory(Pathology\User::class, 'operator')->create();
        $this->assertTrue($user->isOperator(), 'User is an operator');
    }

}
