<?php

use PHPUnit\Framework\TestCase;
use Sirene\Sirene;

final class SireneTest extends TestCase {
    protected $token = "YOUR_AUTH_TOKEN";

    public function testInformations()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->informations(), true);
        $this->assertArrayHasKey('etatService', $results);
    }

    public function testSirenSearch()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siren(null), true);
        $this->assertArrayHasKey('unitesLegales', $results);
    }

    public function testSirenSearchWithOptions()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siren(null, ['nombre' => 1]), true);
        $this->assertArrayHasKey('unitesLegales', $results);
    }

    public function testSirenSearchWithSirenNumber()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siren("213105554", ['nombre' => 1]), true);
        $this->assertArrayHasKey('uniteLegale', $results);
    }

    public function testNonDiffusiblesSirenSearch()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siren("nonDiffusibles", ['nombre' => 1]), true);
        $this->assertArrayHasKey('unitesLegalesNonDiffusibles', $results);
    }

    public function testSiretSearch()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siret(null), true);
        $this->assertArrayHasKey('etablissements', $results);
    }

    public function testSiretSearchWithOptions()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siret(null, ['nombre' => 1]), true);
        $this->assertArrayHasKey('etablissements', $results);
    }

    public function testSiretSearchWithSirenNumber()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siret("21310555400017", ['nombre' => 1]), true);
        $this->assertArrayHasKey('etablissement', $results);
    }

    public function testNonDiffusiblesSiretSearch()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siret("nonDiffusibles", ['nombre' => 1]), true);
        $this->assertArrayHasKey('etablissementsNonDiffusibles', $results);
    }

    public function testLiensSuccessionSiretSearch()
    {
        $sirene = new Sirene($this->token);
        $results = json_decode($sirene->siret("liensSuccession", ['nombre' => 1]), true);
        $this->assertArrayHasKey('liensSuccession', $results);
    }
}