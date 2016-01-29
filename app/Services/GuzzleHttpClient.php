<?php  namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClient {

    protected $guzzle;

    /**
     * @param Client $guzzle
     */
    function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * Parse the given URL
     *
     * @param $url
     * @return array|mixed
     */
    public function parseUrl($url)
    {

        $response = $this->makeRequest($url);
        // if response was not successful it will be an empty array
        if(is_array($response)) return $response;

        if($this->responseIsJSON($response)) {
            return json_decode($response->getBody(), true);
        }

    }

    /**
     * Make a request to $url
     *
     * @param $url
     * @return array|mixed
     */
    protected function makeRequest($url) {
        try {
            return $this->guzzle->request('GET', $url);
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * Figure out if $response is of JSON type
     *
     * @param $response
     * @return bool
     */
    protected function responseIsJSON($response) {
        return $response->getHeaderLine('content-type') == 'application/json';
    }

}