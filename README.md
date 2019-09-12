# PHP SIRENE API

PHP package to use version 2 of SIRENE API.

## Install

```
$ composer require cba85/php-sirene-api
```

## Usage

```php
<?php

// Composer autoload
require dirname(__DIR__) .  "/vendor/autoload.php";

// SIRENE class
$sirene = new Sirene\Sirene;

// Version 2 - Siren
$results = $sirene->siren("213105554", []);

// Version 2 - Etablissements
$results = $sirene->etablissements("213105554", []);

// Version 2 - Etablissements Geo Json
$results = $sirene->etablissementsGeojson("213105554", []);
```

## Tests

```bash
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/SireneTest
```