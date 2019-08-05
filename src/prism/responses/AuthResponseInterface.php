<?php

namespace unapi\kontur\prism\responses;

use unapi\interfaces\DtoInterface;

interface AuthResponseInterface extends DtoInterface
{
    /**
     * @return string|null
     */
    public function getSid(): ?string;

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string;
}