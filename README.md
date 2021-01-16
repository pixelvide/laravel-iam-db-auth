## laravel-iam-db-auth

This is a package to connect Laravel with a AWS RDS instance using IAM authentication.

It includes a service provider that gives the framework our overridden MySQL connector class when it asks
for an MySQL connection.

## Installation

require this package with composer:

```shell
composer require pixelvide/laravel-iam-db-auth
```

Add the `IamDatabaseConnectorProvider` to your config/app.php

Add a missing variables in connection to the config array in config/database.php

```php
<?php [
    'mysql' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'database_name'),
        'username' => env('DB_USERNAME', 'database_username'),
        'password' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => null,
        'aws_profile' => env('AWS_PROFILE'),
        'aws_credential_path' => env('AWS_CREDENTIAL_PATH'),
        'aws_region' => env('AWS_REGION'),
        'use_iam_auth' => env('DB_USE_IAM_AUTH', true),
        'options' => array(
            'MYSQLI_READ_DEFAULT_FILE' => env('MYSQL_CNF_FILE', '/path/to/cnf/file'),
            PDO::MYSQL_ATTR_SSL_CA    => env('RDS_CA_BUNDLE', '/path/to/rds-combined-ca-bundle.pem'),       
        ),
    ],
];
```

Obtain the rds-combined-ca-bundle.pem from https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/UsingWithRDS.SSL.html

