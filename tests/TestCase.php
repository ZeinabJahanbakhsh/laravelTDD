<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected  function  setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->artisan('migrate');
        $this->artisan('db:seed');

        //error handling, display error'path
        //$this->withoutExceptionHandling();

    }
}
