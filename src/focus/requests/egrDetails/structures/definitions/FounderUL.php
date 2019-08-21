<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class FounderUL implements DtoInterface
{
    /** @var string */
    private $ogrn;
    /** @var string */
    private $inn;
    /** @var string */
    private $fullName;
    /** @var Share */
    private $share;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * FounderUL constructor.
     * @param string $ogrn
     * @param string $inn
     * @param string $fullName
     * @param Share $share
     * @param \DateTimeImmutable|null $date
     * @param \DateTimeImmutable|null $firstDate
     */
    public function __construct(string $ogrn, string $inn, string $fullName, Share $share, ?\DateTimeImmutable $date, ?\DateTimeImmutable $firstDate)
    {
        $this->ogrn = $ogrn;
        $this->inn = $inn;
        $this->fullName = $fullName;
        $this->share = $share;
        $this->date = $date;
        $this->firstDate = $firstDate;
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
     * @return Share
     */
    public function getShare(): Share
    {
        return $this->share;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFirstDate(): ?\DateTimeImmutable
    {
        return $this->firstDate;
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
            Share::toDto($data['share']),
            Date::convert($data['date']),
            Date::convert($data['firstDate'])
        );
    }
}
