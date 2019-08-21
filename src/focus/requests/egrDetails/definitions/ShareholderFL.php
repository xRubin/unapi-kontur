<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class ShareholderFL implements DtoInterface
{
    /** @var string */
    private $fio;
    /** @var string */
    private $address;
    /** @var float */
    private $votingSharesPercent;
    /** @var float */
    private $capitalSharesPercent;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * ShareholderFL constructor.
     * @param string $fio
     * @param string $address
     * @param float $votingSharesPercent
     * @param float $capitalSharesPercent
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $fio, string $address, float $votingSharesPercent, float $capitalSharesPercent, ?\DateTimeImmutable $date)
    {
        $this->fio = $fio;
        $this->address = $address;
        $this->votingSharesPercent = $votingSharesPercent;
        $this->capitalSharesPercent = $capitalSharesPercent;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getFio(): string
    {
        return $this->fio;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return float
     */
    public function getVotingSharesPercent(): float
    {
        return $this->votingSharesPercent;
    }

    /**
     * @return float
     */
    public function getCapitalSharesPercent(): float
    {
        return $this->capitalSharesPercent;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (string)$data['fio'],
            (string)$data['address'],
            (float)$data['votingSharesPercent'],
            (float)$data['capitalSharesPercent'],
            Date::convert($data['date'])
        );
    }
}
