<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParseUrlRequest;
use App\Services\HttpClient;

use App\Http\Requests;

class ParsingController extends Controller
{

    protected $client;

    function __construct(HttpClient $client)
    {
        $this->client = $client;

    }

    public function parse(ParseUrlRequest $request) {

        $entity_info_array = $this->client->parseUrl($request->url);

        return view('parser')->with('data', $entity_info_array);

    }

}
