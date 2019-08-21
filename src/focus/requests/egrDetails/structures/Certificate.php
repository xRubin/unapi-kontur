<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Date;

class Certificate implements DtoInterface
{
    /** @var string */
    private $serialNumber;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * Certificate constructor.
     * @param string $serialNumber
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $serialNumber, ?\DateTimeImmutable $date)
    {
        $this->serialNumber = $serialNumber;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSerialNumber(): string
    {
        return $this->serialNumber;
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
            (string)$data['serialNumber'],
            Date::convert($data['date'])
        );
    }
}