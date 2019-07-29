<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

interface TokenByPasswordResponseInterface extends DtoInterface
{
    /**
     * @return mixed
     */
    public function getTrustedCertificates();

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return array
     */
    public function getMessages(): array;

    /**
     * @return string
     */
    public function getToken(): string;

    /**
     * @return string
     */
    public function getSid(): string;

    /**
     * @return mixed
     */
    public function getThumbprint();

    /**
     * @return bool
     */
    public function isV5(): bool;
}