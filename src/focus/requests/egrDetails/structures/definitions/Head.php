<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class Head implements DtoInterface
{
    /** @var string */
    private $fio;
    /** @var string|null */
    private $innfl;
    /** @var string */
    private $position;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * Head constructor.
     * @param string $fio
     * @param string $position
     * @param \DateTimeImmutable|null $date
     * @param \DateTimeImmutable|null $firstDate
     */
    public function __construct(string $fio, string $position, ?\DateTimeImmutable $date, ?\DateTimeImmutable $firstDate)
    {
        $this->fio = $fio;
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
    public function getPosition(): string
    {
        return $this->position;
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
     * @return null|string
     */
    public function getInnfl(): ?string
    {
        return $this->innfl;
    }

    /**
     * @param null|string $innfl
     * @return Head
     */
    public function setInnfl(?string $innfl): Head
    {
        $this->innfl = $innfl;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self(
            (string)$data['fio'],
            (string)$data['position'],
            Date::convert($data['date']),
            Date::convert($data['firstDate'])
        );

        if (array_key_exists('innfl', $data))
            $result->setInnfl($data['innfl']);

        return $result;
    }
}
