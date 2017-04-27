<?php

namespace Tests;

use PagSeguro\Library;

class Suite extends \PHPUnit\Framework\TestSuite
{
    public static function suite()
    {
        return new Suite('Setup');
    }

    protected function setUp()
    {
        Library::initialize();
    }
}