<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class testUserLogin extends DuskTestCase
{

    public function test_user_login_experience()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertSee('Login')
                ->type('email', 'doe@joe.com')
                ->type('password', '123456')
                ->click('button[type="submit"]')
                ->assertSee("do not match our records");
        });
    }

    public function test_user_authentication()
    {
        $this->browse(function ($first) {
            $first->visit('/posts')
                    ->assertSee('Password');
        });
    }
}


