<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class FounderForeign implements DtoInterface
{
    /** @var string|null */
    private $fullName;
    /** @var string|null */
    private $country;
    /** @var Share|null */
    private $share;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * @return null|string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param null|string $fullName
     * @return FounderForeign
     */
    public function setFullName(?string $fullName): FounderForeign
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     * @return FounderForeign
     */
    public function setCountry(?string $country): FounderForeign
    {
        $this->country = $country;
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
     * @return FounderForeign
     */
    public function setShare(?Share $share): FounderForeign
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
     * @return FounderForeign
     */
    public function setDate(?\DateTimeImmutable $date): FounderForeign
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
     * @return FounderForeign
     */
    public function setFirstDate(?\DateTimeImmutable $firstDate): FounderForeign
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

        if (array_key_exists('fullName', $data))
            $result->setFullName((string)$data['fullName']);

        if (array_key_exists('country', $data))
            $result->setCountry((string)$data['country']);

        if (array_key_exists('share', $data))
            $result->setShare(Share::toDto($data['share']));

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        if (array_key_exists('firstDate', $data))
            $result->setFirstDate(Date::convert($data['firstDate']));

        return $result;
    }
}
