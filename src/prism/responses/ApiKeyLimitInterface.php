<?php

namespace unapi\kontur\prism\responses;

use unapi\interfaces\DtoInterface;

interface ApiKeyLimitInterface extends DtoInterface
{
    /**
     * @return string
     */
    public function getAction(): string;

    /**
     * @return int
     */
    public function getNumericLimit(): int;

    /**
     * @return \DateTimeInterface
     */
    public function getDateTimeLimit(): \DateTimeInterface;

    /**
     * @return int
     */
    public function getTotalAmountOfUse(): int;
}