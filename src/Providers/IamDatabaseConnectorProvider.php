<?php

namespace Pixelvide\DBAuth\Providers;

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
            if ($connection['use_iam_auth']) {
                switch ($connection['driver']) {
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