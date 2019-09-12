<?php

namespace Sirene\Traits;

trait Builder
{
    private $url = "https://entreprise.data.gouv.fr/api/sirene";

    private $search;

    private $options;

    protected function url($search, array $options): void
    {
        if ($search) {
            $this->search = urlencode($search);
        } else {
            $this->search = null;
        }

        $this->options = http_build_query($options);
    }

    public function curl($encodedUrl): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $encodedUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function request($version, $type, $subtype, $search, $options, $json)
    {
        $this->url($search, $options);

        $encodedUrl = "{$this->url}/{$version}/{$type}/{$this->search}";
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
