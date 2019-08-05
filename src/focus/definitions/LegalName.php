<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class LegalName implements DtoInterface
{
    /** @var string|null */
    private $short;
    /** @var string|null */
    private $full;
    /** @var \DateTimeInterface|null */
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
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface|null $date
     * @return LegalName
     */
    public function setDate(?\DateTimeInterface $date): LegalName
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
            $result->setDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['date']));

        return $result;
    }
}