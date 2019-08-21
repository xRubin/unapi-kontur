<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class FounderForeign implements DtoInterface
{
    /** @var string */
    private $fullName;
    /** @var string */
    private $country;
    /** @var Share */
    private $share;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * FounderForeign constructor.
     * @param string $fullName
     * @param string $country
     * @param Share $share
     * @param \DateTimeImmutable|null $date
     * @param \DateTimeImmutable|null $firstDate
     */
    public function __construct(string $fullName, string $country, Share $share, ?\DateTimeImmutable $date, ?\DateTimeImmutable $firstDate)
    {
        $this->fullName = $fullName;
        $this->country = $country;
        $this->share = $share;
        $this->date = $date;
        $this->firstDate = $firstDate;
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
    public function getCountry(): string
    {
        return $this->country;
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
            (string)$data['fullName'],
            (string)$data['country'],
            Share::toDto($data['share']),
            Date::convert($data['date']),
            Date::convert($data['firstDate'])
        );
    }
}
