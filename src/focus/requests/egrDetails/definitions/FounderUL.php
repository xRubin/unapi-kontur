<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class FounderUL implements DtoInterface
{
    /** @var string|null */
    private $ogrn;
    /** @var string|null */
    private $inn;
    /** @var string|null */
    private $fullName;
    /** @var Share|null */
    private $share;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * @return null|string
     */
    public function getOgrn(): ?string
    {
        return $this->ogrn;
    }

    /**
     * @param null|string $ogrn
     * @return FounderUL
     */
    public function setOgrn(?string $ogrn): FounderUL
    {
        $this->ogrn = $ogrn;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getInn(): ?string
    {
        return $this->inn;
    }

    /**
     * @param null|string $inn
     * @return FounderUL
     */
    public function setInn(?string $inn): FounderUL
    {
        $this->inn = $inn;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param null|string $fullName
     * @return FounderUL
     */
    public function setFullName(?string $fullName): FounderUL
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return null|Share
     */
    public function getShare(): ?Share
    {
        return $this->share;
    }

    /**
     * @param null|Share $share
     * @return FounderUL
     */
    public function setShare(?Share $share): FounderUL
    {
        $this->share = $share;
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
     * @return FounderUL
     */
    public function setDate(?\DateTimeImmutable $date): FounderUL
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFirstDate(): ?\DateTimeImmutable
    {
        return $this->firstDate;
    }

    /**
     * @param \DateTimeImmutable|null $firstDate
     * @return FounderUL
     */
    public function setFirstDate(?\DateTimeImmutable $firstDate): FounderUL
    {
        $this->firstDate = $firstDate;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('ogrn', $data))
            $result->setOgrn((string)$data['ogrn']);

        if (array_key_exists('inn', $data))
            $result->setInn((string)$data['inn']);

        if (array_key_exists('fullName', $data))
            $result->setFullName((string)$data['fullName']);

        if (array_key_exists('share', $data))
            $result->setShare(Share::toDto($data['share']));

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        if (array_key_exists('firstDate', $data))
            $result->setFirstDate(Date::convert($data['firstDate']));

        return $result;
    }
}
