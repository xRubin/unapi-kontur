<?php

namespace unapi\kontur\focus\requests\req\definitions;

use unapi\interfaces\DtoInterface;

class ManagementCompany implements DtoInterface
{
    /** @var string */
    private $name;
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * ManagementCompany constructor.
     * @param string $name
     * @param string $inn
     * @param string $ogrn
     * @param \DateTimeImmutable|null $date
     * @param \DateTimeImmutable|null $firstDate
     */
    public function __construct(string $name, string $inn, string $ogrn, ?\DateTimeImmutable $date, ?\DateTimeImmutable $firstDate)
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
            (string)$data['name'],
            (string)$data['inn'],
            (string)$data['ogrn'],
            Date::convert($data['date']),
            Date::convert($data['firstDate'])
        );
    }
}
