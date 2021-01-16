<?php

namespace Pixelvide\DBAuth\Test;

use Pixelvide\DBAuth\Providers\IamDatabaseConnectorProvider;

class TestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            IamDatabaseConnectorProvider::class
        ];
    }

}