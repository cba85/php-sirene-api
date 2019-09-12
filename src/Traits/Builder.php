<?php
namespace Sirene\Traits;

use GuzzleHttp\Client;

/**
 * Builder trait
 */
trait Builder
{
    /**
     * API base url
     *
     * @var string
     */
    private $url = "https://api.insee.fr/entreprises/sirene";

    /**
     * Search parameter
     *
     * @var string
     */
    private $search;

    /**
     * Options
     *
     * @var array
     */
    private $options;

    /**
     * Generate url query
     *
     * @param string $search
     * @param array $options
     * @return void
     */
    protected function url($search, array $options): void
    {
        if ($search) {
            $this->search = urlencode($search);
        } else {
            $this->search = null;
        }

        $this->options = http_build_query($options);
    }

    /**
     * Make API request using Guzzle library
     *
     * @param string $encodedUrl
     * @return string
     */
    public function curl(string $encodedUrl): string
    {
        $client = new Client;
        $headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json',
        ];
        $response = $client->request('GET', $encodedUrl, ['headers' => $headers]);
        return $response->getBody()->getContents();
    }

    /**
     * Generate response
     *
     * @param string $type
     * @param void|string $subtype
     * @param void|string $search
     * @param array $options
     * @param boolean $json
     * @return string
     */
    public function request(string $type, $subtype, $search, array $options, bool $json) : string
    {
        $this->url($search, $options);

        $encodedUrl = "{$this->url}/{$this->version}/{$type}/{$this->search}";
        if ($subtype) {
            $encodedUrl .= "/{$subtype}";
        }
        $encodedUrl .= "?{$this->options}";

        $jsonResponse = $this->curl($encodedUrl);

        if (!$json) {
            return json_decode($jsonResponse);
        }

        return $jsonResponse;
    }
}
