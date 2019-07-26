<?php

namespace unapi\kontur\prism\api;

class Client extends \GuzzleHttp\Client
{

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (!array_key_exists('base_uri', $config))
            $config['base_uri'] = 'https://kyc.kontur.ru';

        if (!array_key_exists('verify', $config))
            $config['verify'] = false;

        $config['headers']['Accept'] = 'application/json';
        $config['headers']['Content-type'] = 'application/json';

        parent::__construct($config);
    }
}