<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class LegalName implements DtoInterface
{
    /** @var string|null */
    private $short;
    /** @var string|null */
    private $full;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * @return null|string
     */
    public function getShort(): ?string
    {
        return $this->short;
    }

    /**
     * @param null|string $short
     * @return LegalName
     */
    public function setShort(?string $short): LegalName
    {
        $this->short = $short;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFull(): ?string
    {
        return $this->full;
    }

    /**
     * @param null|string $full
     * @return LegalName
     */
    public function setFull(?string $full): LegalName
    {
        $this->full = $full;
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
     * @return LegalName
     */
    public function setDate(?\DateTimeImmutable $date): LegalName
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
        $result = new self();

        if (array_key_exists('short', $data))
            $result->setShort($data['short']);

        if (array_key_exists('full', $data))
            $result->setFull($data['full']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}