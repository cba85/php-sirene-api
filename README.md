# PHP SIRENE API

PHP package to use version 1 of SIRENE API.

https://entreprise.data.gouv.fr/api_doc_sirene

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

// Version 1 - Fulltext
$results = $sirene->fullText("montpellier", []);

// Version 1 - Siret
$results = $sirene->siret("21310555400017", []);

// Version 1 - Siren
$results = $sirene->siren("213105554", []);

// Version 1 - Rna
$results = $sirene->rna("W9C1000188", []);

// Version 1 - Near Point
$results = $sirene->nearPoint(['lat' => "43.6", 'long' => "3.884865"]);

// Version 1 - Near Etablissement
$results = $sirene->nearEtablissement("21340172201787");

// Version 1 - Near Etablissement Geo Json
$results = $sirene->nearEtablissementGeojson("21340172201787");
```

## Tests

```bash
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/SireneTest
```