<?php

use PHPUnit\Framework\TestCase;
use Sirene\Sirene;

final class SireneTest extends TestCase {

    public function testFullTextSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->fullText("montpellier"), true);
        $this->assertArrayHasKey('etablissement', $data);
    }

    public function testSiretSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->siret("21310555400017"), true);
        $this->assertArrayHasKey('etablissement', $data);
    }

    public function testSirenSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->siren("213105554"), true);
        $this->assertArrayHasKey('total_results', $data);
    }

    public function testRnaSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->rna("W9C1000188"), true);
        $this->assertArrayHasKey('message', $data);
    }

    public function testNearPointSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->nearPoint(['lat' => "43.6", 'long' => "3.884865"]), true);
        $this->assertArrayHasKey('total_results', $data);
    }

    public function testNearEtablissementSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->nearEtablissement("21340172201787"), true);
        $this->assertArrayHasKey('total_results', $data);
    }

    public function testNearEtablissementGeojsonSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->nearEtablissementGeojson("21340172201787"), true);
        $this->assertArrayHasKey('total_results', $data);
    }
}