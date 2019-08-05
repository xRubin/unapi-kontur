<?php

namespace unapi\kontur\focus;

class Credentials implements CredentialsInterface
{
    /** @var string */
    private $key;

    /**
     * Credentials constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}