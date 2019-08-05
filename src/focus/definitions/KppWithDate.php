<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class KppWithDate implements DtoInterface
{
    /** @var string */
    private $kpp;
    /** @var \DateTimeInterface */
    private $date;

    /**
     * KppWithDate constructor.
     * @param string $kpp
     * @param \DateTimeInterface $date
     */
    public function __construct(string $kpp, \DateTimeInterface $date)
    {
        $this->kpp = $kpp;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getKpp(): string
    {
        return $this->kpp;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
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
            (string)$data['kpp'],
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date'])
        );
    }
}
