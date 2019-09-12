<?php

namespace Sirene;

use Sirene\Traits\Builder;

/**
 * Sirene Version 3 API
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
     * Api token
     *
     * @var string
     */
    private $token;

    /**
     * Constructor
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->version = "V3";
    }

    /**
     * SIREN search
     * @param  array        $string
     * @param  array        $options
     * @param  bool|boolean $json
     * @return string|object
     */
    public function siren($search = null, array $options = [], bool $json = true)
    {
        return $this->request('siren', null, $search, $options, $json);
    }

    /**
     * SIRET search
     * @param  array        $string
     * @param  array        $options
     * @param  bool|boolean $json
     * @return string|object
     */
    public function siret($search = null, array $options = [], bool $json = true)
    {
        return $this->request('siret', null, $search, $options, $json);
    }

    /**
     * API information
     * @param  bool|boolean $json
     * @return string|object
     */
    public function informations(bool $json = true)
    {
        return $this->request('informations', null, null, [], $json);
    }

}