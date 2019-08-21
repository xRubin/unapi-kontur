<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class Head implements DtoInterface
{
    /** @var string */
    private $fio;
    /** @var string|null */
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
     * @param string $position
     * @param \DateTimeInterface $date
     * @param \DateTimeInterface $firstDate
     */
    public function __construct(string $fio, string $position, \DateTimeInterface $date, \DateTimeInterface $firstDate)
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
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date']),
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['firstDate'])
        );

        if (array_key_exists('innfl', $data))
            $result->setInnfl($data['innfl']);

        return $result;
    }
}
