<?php

namespace unapi\kontur\prism;

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

    /** @var string|null */
    private $authSid;

    /**
     * Credentials constructor.
     * @param string $login
     * @param string $password
     * @param string $bankId
     * @param string $apiKey
     */
    public function __construct(string $login, string $password, string $bankId, ?string $apiKey = null)
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
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return CredentialsInterface
     */
    public function setApiKey(string $apiKey): CredentialsInterface
    {
        $this->apiKey = $apiKey;
        return $this;
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