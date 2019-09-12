<?php

namespace Sirene;

use Sirene\Traits\Builder;

/**
 * Sirene Version 1 API
 */
class Sirene
{
    /**
     * Query builder trait
     */
    use Builder;

    /**
     * Version
     *
     * @var string
     */
    protected $version;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->version = "v1";
    }

    /**
     * Full text search
     * @param  string         $search
     * @param  array          $options
     * @param  bool|boolean   $json
     * @return string|object
     */
    public function fullText(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'full_text', null, $search, $options, $json);
    }

    /**
     * SIRET search
     * @param  string       $search
     * @param  array        $options
     * @param  bool|boolean $json
     * @return string|object
     */
    public function siret(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'siret', null, $search, $options, $json);
    }

    /**
     * SIREN search
     * @param  string       $search
     * @param  array        $options
     * @param  bool|boolean $json
     * @return string|object
     */
    public function siren(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'siren', null, $search, $options, $json);
    }

    /**
     * RNA search
     * @param  string       $search
     * @param  array        $options
     * @param  bool|boolean $json
     * @return string|object
     */
    public function rna(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'rna', null, $search, $options, $json);
    }

    /**
     * Suggest
     *
     * @param string $search
     * @param array $options
     * @param boolean $json
     * @return void
     */
    public function suggest(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'suggest', null, $search, $options, $json);
    }

    /**
     * Near point
     *
     * @param array $options
     * @param boolean $json
     * @return void
     */
    public function nearPoint(array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'near_point', null, $search = null, $options, $json);
    }

    /**
     * Near etablissement
     *
     * @param string $search
     * @param array $options
     * @param boolean $json
     * @return void
     */
    public function nearEtablissement(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'near_etablissement', null, $search, $options, $json);
    }

    /**
     * Near etablissement GeoJson
     *
     * @param string $search
     * @param array $options
     * @param boolean $json
     * @return void
     */
    public function nearEtablissementGeojson(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'near_etablissement_geojson', null, $search, $options, $json);
    }

}