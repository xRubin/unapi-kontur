<?php

namespace unapi\kontur\prism\api;

class Credentials implements CredentialsInterface
{
    /** @var string */
    private $login;
    /** @var string */
    private $password;
    /** @var string */
    private $bankId;
    /** @var string */
    private $apiKey;

    /** @var string */
    private $authSid;

    /**
     * Credentials constructor.
     * @param string $login
     * @param string $password
     * @param string $bankId
     * @param string $apiKey
     */
    public function __construct(string $login, string $password, string $bankId, string $apiKey)
    {
        $this->login = $login;
        $this->password = $password;
        $this->bankId = $bankId;
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getBankId(): string
    {
        return $this->bankId;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string|null
     */
    public function getAuthSid(): ?string
    {
        return $this->authSid;
    }

    /**
     * @param string $authSid
     * @return CredentialsInterface
     */
    public function setAuthSid(string $authSid): CredentialsInterface
    {
        $this->authSid = $authSid;
        return $this;
    }
}