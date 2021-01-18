## laravel-iam-db-auth

This is a package to connect Laravel with a AWS RDS instance using IAM authentication.

It includes a service provider that gives the framework our overridden MySQL/PGSQL connector class when it asks
for an MySQL/PGSQL connection.

## Installation

require this package with composer:

```shell
composer require pixelvide/laravel-iam-db-auth
```

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
        'aws_region' => env('AWS_REGION'),
        'use_iam_auth' => env('DB_USE_IAM_AUTH', false),
        'options' => array(
            'MYSQLI_READ_DEFAULT_FILE' => env('MYSQL_CNF_FILE', '/path/to/cnf/file'),
            PDO::MYSQL_ATTR_SSL_CA    => base_path('vendor/pixelvide/laravel-iam-db-auth/certs/rds-ca-2019-root.pem'),
        ),
    ],
];
```


```php
<?php [
    'pgsql' => [
        'driver' => 'pgsql',
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '5432'),
        'database' => env('DB_DATABASE', 'database_name'),
        'username' => env('DB_USERNAME', 'database_username'),
        'password' => '',
        'charset' => 'utf8mb4',
        'aws_region' => env('AWS_REGION'),
        'use_iam_auth' => env('DB_USE_IAM_AUTH', false),
        'sslmode' => 'verify-full',
        'sslrootcert' => base_path('vendor/pixelvide/laravel-iam-db-auth/certs/rds-ca-2019-root.pem'),
        'options' => array(
            PDO::ATTR_PERSISTENT => env('DB_PERSISTENT', false),      
        ),
    ],
];
```

Obtain the rds-combined-ca-bundle.pem from https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/UsingWithRDS.SSL.html

