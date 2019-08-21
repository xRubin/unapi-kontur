<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Date;

class Successor implements DtoInterface
{
    /** @var string */
    private $name;
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * Successor constructor.
     * @param string $name
     * @param string $inn
     * @param string $ogrn
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $name, string $inn, string $ogrn, ?\DateTimeImmutable $date)
    {
        $this->name = $name;
        $this->inn = $inn;
        $this->ogrn = $ogrn;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getOgrn(): string
    {
        return $this->ogrn;
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
            (string)$data['name'],
            (string)$data['inn'],
            (string)$data['ogrn'],
            Date::convert($data['date'])
        );
    }
}