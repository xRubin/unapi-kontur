<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\req\definitions\Date;

class StatusIP implements DtoInterface
{
    /** @var string */
    private $statusString;
    /** @var bool|null */
    private $dissolved;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * StatusIP constructor.
     * @param string $statusString
     */
    public function __construct(string $statusString)
    {
        $this->statusString = $statusString;
    }

    /**
     * @return string
     */
    public function getStatusString(): string
    {
        return $this->statusString;
    }

    /**
     * @return bool|null
     */
    public function getDissolved(): ?bool
    {
        return $this->dissolved;
    }

    /**
     * @param bool|null $dissolved
     * @return StatusIP
     */
    public function setDissolved(?bool $dissolved): StatusIP
    {
        $this->dissolved = $dissolved;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable|null $date
     * @return StatusIP
     */
    public function setDate(?\DateTimeImmutable $date): StatusIP
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self((string)$data['statusString']);

        if (array_key_exists('dissolved', $data))
            $result->setDissolved($data['dissolved']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}