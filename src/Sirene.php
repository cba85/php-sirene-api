<?php

namespace Sirene;

use Sirene\Traits\Builder;

/**
 * Sirene Version 2 API
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
        $this->version = "v2";
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
     * Etablissements
     *
     * @param string $search
     * @param array $options
     * @param boolean $json
     * @return void
     */
    public function etablissements(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'siren', 'etablissements', $search, $options, $json);
    }

    /**
     * Etablissements GeoJson
     *
     * @param string $search
     * @param array $options
     * @param boolean $json
     * @return void
     */
    public function etablissementsGeojson(string $search, array $options = [], bool $json = true)
    {
        return $this->request($this->version, 'siren', 'etablissements_geojson', $search, $options, $json);
    }

}