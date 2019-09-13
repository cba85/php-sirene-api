# PHP SIRENE API

PHP package to use version 3 of SIRENE API.

### Authentification

You need a token authentification to use SIRENE API version 3. You can generate one on INSEE website : https://api.insee.fr/catalogue/site/themes/wso2/subthemes/insee/pages/item-info.jag?name=Sirene&version=V3&provider=insee

### Older version

- **For the version 1 of SIRENE API, please check out the `v1` branch in this repository.**
- **For the version 2 of SIRENE API, please check out the `v2` branch in this repository.**

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
$sirene = new \Sirene\Sirene("YOUR_AUTH_TOKEN");

// Version 3 - SIREN
$results = $sirene->siren(null, ['nombre' => 5]);
$results = $sirene->siren("213105554");
$results = $sirene->siren("nonDiffusibles", ['nombre' => 10]);

// Version 3 - SIRET
$results = $sirene->siret(null, ['nombre' => 5]);
$results = $sirene->siret("213105554");
$results = $sirene->siret("liensSuccession", ['nombre' => 25]);
$results = $sirene->siret("nonDiffusibles", ['nombre' => 10]);

// Version 3 - Information
$results = $sirene->informations();
```

## Dependencies

- https://github.com/guzzle/guzzle

## Tests

Enter your auth token in `tests/SireneTest.php`:

```php
protected $token = "YOUR_TOKEN";
```

```bash
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/SireneTest
```