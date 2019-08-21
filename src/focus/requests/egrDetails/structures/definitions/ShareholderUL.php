<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class ShareholderUL implements DtoInterface
{
    /** @var string */
    private $ogrn;
    /** @var string */
    private $inn;
    /** @var string */
    private $fullName;
    /** @var string */
    private $address;
    /** @var float */
    private $votingSharesPercent;
    /** @var float */
    private $capitalSharesPercent;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * ShareholderUL constructor.
     * @param string $ogrn
     * @param string $inn
     * @param string $fullName
     * @param string $address
     * @param float $votingSharesPercent
     * @param float $capitalSharesPercent
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $ogrn, string $inn, string $fullName, string $address, float $votingSharesPercent, float $capitalSharesPercent, ?\DateTimeImmutable $date)
    {
        $this->ogrn = $ogrn;
        $this->inn = $inn;
        $this->fullName = $fullName;
        $this->address = $address;
        $this->votingSharesPercent = $votingSharesPercent;
        $this->capitalSharesPercent = $capitalSharesPercent;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
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
            (string)$data['ogrn'],
            (string)$data['inn'],
            (string)$data['fullName'],
            (string)$data['address'],
            (float)$data['votingSharesPercent'],
            (float)$data['capitalSharesPercent'],
            Date::convert($data['date'])
        );
    }
}
