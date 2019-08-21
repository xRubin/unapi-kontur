<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\req\definitions\Date;

class StatusUL implements DtoInterface
{
    /** @var string */
    private $statusString;
    /** @var bool|null */
    private $reorganizing;
    /** @var bool|null */
    private $dissolving;
    /** @var bool|null */
    private $dissolved;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * StatusUL constructor.
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
    public function getReorganizing(): ?bool
    {
        return $this->reorganizing;
    }

    /**
     * @param bool|null $reorganizing
     * @return StatusUL
     */
    public function setReorganizing(?bool $reorganizing): StatusUL
    {
        $this->reorganizing = $reorganizing;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDissolving(): ?bool
    {
        return $this->dissolving;
    }

    /**
     * @param bool|null $dissolving
     * @return StatusUL
     */
    public function setDissolving(?bool $dissolving): StatusUL
    {
        $this->dissolving = $dissolving;
        return $this;
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
     * @return StatusUL
     */
    public function setDissolved(?bool $dissolved): StatusUL
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
     * @return StatusUL
     */
    public function setDate(?\DateTimeImmutable $date): StatusUL
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

        if (array_key_exists('reorganizing', $data))
            $result->setReorganizing($data['reorganizing']);

        if (array_key_exists('dissolving', $data))
            $result->setDissolving($data['dissolving']);

        if (array_key_exists('dissolved', $data))
            $result->setDissolved($data['dissolved']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}