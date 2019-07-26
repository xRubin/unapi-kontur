<?php

namespace unapi\kontur\prism\api\responses;

use unapi\interfaces\DtoInterface;

class ApiKeyLimit implements ApiKeyLimitInterface
{
    /** @var string */
    private $action;
    /** @var int */
    private $numericLimit;
    /** @var \DateTimeInterface */
    private $dateTimeLimit;
    /** @var int */
    private $totalAmountOfUse;

    /**
     * ApiKeyLimit constructor.
     * @param string $action
     * @param int $numericLimit
     * @param \DateTimeInterface $dateTimeLimit
     * @param int $totalAmountOfUse
     */
    public function __construct(string $action, int $numericLimit, \DateTimeInterface $dateTimeLimit, int $totalAmountOfUse)
    {
        $this->action = $action;
        $this->numericLimit = $numericLimit;
        $this->dateTimeLimit = $dateTimeLimit;
        $this->totalAmountOfUse = $totalAmountOfUse;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return int
     */
    public function getNumericLimit(): int
    {
        return $this->numericLimit;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateTimeLimit(): \DateTimeInterface
    {
        return $this->dateTimeLimit;
    }

    /**
     * @return int
     */
    public function getTotalAmountOfUse(): int
    {
        return $this->totalAmountOfUse;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (string)$data['action'],
            (int)$data['numericLimit'],
            new \DateTimeImmutable($data['dateTimeLimit']),
            (int)$data['totalAmountOfUse']
        );
    }
}