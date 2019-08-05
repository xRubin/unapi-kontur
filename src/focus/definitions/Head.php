<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class Head implements DtoInterface
{
    /** @var string */
    private $fio;
    /** @var string */
    private $innfl;
    /** @var string */
    private $position;
    /** @var \DateTimeInterface */
    private $date;
    /** @var \DateTimeInterface */
    private $firstDate;

    /**
     * Head constructor.
     * @param string $fio
     * @param string $innfl
     * @param string $position
     * @param \DateTimeInterface $date
     * @param \DateTimeInterface $firstDate
     */
    public function __construct(string $fio, string $innfl, string $position, \DateTimeInterface $date, \DateTimeInterface $firstDate)
    {
        $this->fio = $fio;
        $this->innfl = $innfl;
        $this->position = $position;
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
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getFirstDate(): \DateTimeInterface
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
            (string)$data['position'],
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date']),
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['firstDate'])
        );
    }
}
