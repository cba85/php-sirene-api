<?php

use PHPUnit\Framework\TestCase;
use Sirene\Sirene;

final class SireneTest extends TestCase {

    public function testSirenSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->siren("213105554"), true);
        $this->assertArrayHasKey('sirene', $data);
    }

    public function testEtablissementsSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->etablissements("213105554"), true);
        $this->assertArrayHasKey('total_results', $data);
    }

    public function testEtablissementsGeojsonSearch()
    {
        $sirene = new Sirene;
        $data = json_decode($sirene->etablissementsGeojson("213105554"), true);
        $this->assertArrayHasKey('total_results', $data);
    }
}