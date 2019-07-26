<?php

namespace unapi\kontur\prism\api\responses;

use unapi\interfaces\DtoInterface;

interface ApiKeysResponseInterface extends DtoInterface
{
    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getComment(): string;

    /**
     * @return ApiKeyLimit[]
     */
    public function getLimits(): array;
}