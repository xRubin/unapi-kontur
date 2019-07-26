<?php

namespace unapi\kontur\prism\web;

class Client extends \GuzzleHttp\Client
{
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (!array_key_exists('base_uri', $config))
            $config['base_uri'] = 'https://api.kontur.ru';

        if (!array_key_exists('cookies', $config))
            $config['cookies'] = true;

        if (!array_key_exists('verify', $config))
            $config['verify'] = false;

        parent::__construct($config);
    }
}