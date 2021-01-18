<?php

namespace Pixelvide\DBAuth;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class IamDatabaseConnectorProvider extends ServiceProvider
{
    /**
     * Register the application services.
     * Swap out the default connector and bind our custom one.
     *
     * @return void
     */
    public function register()
    {
        $connections = config('database.connections');
        foreach ($connections as $key => $connection) {
            if (Arr::has($connection, 'use_iam_auth') && Arr::get($connection, 'use_iam_auth')) {
                switch (Arr::get($connection, 'driver')) {
                    case "mysql":
                        $this->app->bind('db.connector.mysql', \Pixelvide\DBAuth\Database\MySqlConnector::class);
                        break;
                    case "pgsql":
                        $this->app->bind('db.connector.pgsql', \Pixelvide\DBAuth\Database\PostgresConnector::class);
                        break;
                }
            }
        }
    }
}
