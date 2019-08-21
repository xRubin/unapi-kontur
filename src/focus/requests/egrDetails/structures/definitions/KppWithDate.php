<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class KppWithDate implements DtoInterface
{
    /** @var string */
    private $kpp;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * KppWithDate constructor.
     * @param string $kpp
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $kpp, ?\DateTimeImmutable $date)
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
            (string)$data['kpp'],
            Date::convert($data['date'])
        );
    }
}
