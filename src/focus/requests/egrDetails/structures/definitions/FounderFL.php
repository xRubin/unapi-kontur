<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class FounderFL implements DtoInterface
{
    /** @var string */
    private $fio;
    /** @var string */
    private $innfl;
    /** @var Share */
    private $share;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * FounderFL constructor.
     * @param string $fio
     * @param string $innfl
     * @param Share $share
     * @param \DateTimeImmutable|null $date
     * @param \DateTimeImmutable|null $firstDate
     */
    public function __construct(string $fio, string $innfl, Share $share, ?\DateTimeImmutable $date, ?\DateTimeImmutable $firstDate)
    {
        $this->fio = $fio;
        $this->innfl = $innfl;
        $this->share = $share;
        $this->date = $date;
        $this->firstDate = $firstDate;
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
    public function getInnfl(): string
    {
        return $this->innfl;
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
            (string)$data['fio'],
            (string)$data['innfl'],
            Share::toDto($data['share']),
            Date::convert($data['date']),
            Date::convert($data['firstDate'])
        );
    }
}
