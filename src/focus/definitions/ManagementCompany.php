<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class ManagementCompany implements DtoInterface
{
    /** @var string */
    private $name;
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var \DateTimeInterface */
    private $date;
    /** @var \DateTimeInterface */
    private $firstDate;

    /**
     * ManagementCompany constructor.
     * @param string $name
     * @param string $inn
     * @param string $ogrn
     * @param \DateTimeInterface $date
     * @param \DateTimeInterface $firstDate
     */
    public function __construct(string $name, string $inn, string $ogrn, \DateTimeInterface $date, \DateTimeInterface $firstDate)
    {
        $this->name = $name;
        $this->inn = $inn;
        $this->ogrn = $ogrn;
        $this->date = $date;
        $this->firstDate = $firstDate;
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
            (string)$data['name'],
            (string)$data['inn'],
            (string)$data['ogrn'],
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date']),
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['firstDate'])
        );
    }
}
