<?php

namespace unapi\kontur\prism\api;

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
     * @return string
     */
    public function getApiKey(): string;

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