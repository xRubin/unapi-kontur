<?php

namespace unapi\kontur\prism\common;

interface CredentialsInterface
{
    /**
     * @return string
     */
    public function getLogin(): string;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @return string
     */
    public function getBankId(): string;

    /**
     * @return string|null
     */
    public function getApiKey(): ?string;

    /**
     * @param string $apiKey
     * @return Credentials
     */
    public function setApiKey(string $apiKey): CredentialsInterface;

    /**
     * @return string|null
     */
    public function getAuthSid(): ?string;

    /**
     * @param string $authSid
     * @return CredentialsInterface
     */
    public function setAuthSid(string $authSid): CredentialsInterface;
}