<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;

class StatusIP implements DtoInterface
{
    /** @var string */
    private $statusString;
    /** @var bool|null */
    private $dissolved;
    /** @var \DateTimeInterface|null */
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
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface|null $date
     * @return StatusIP
     */
    public function setDate(?\DateTimeInterface $date): StatusIP
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
            $result->setDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['date']));

        return $result;
    }
}