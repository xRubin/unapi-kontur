<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class ShareholderUL implements DtoInterface
{
    /** @var string|null */
    private $ogrn;
    /** @var string|null */
    private $inn;
    /** @var string|null */
    private $fullName;
    /** @var string|null */
    private $address;
    /** @var float|null */
    private $votingSharesPercent;
    /** @var float|null */
    private $capitalSharesPercent;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * @return null|string
     */
    public function getOgrn(): ?string
    {
        return $this->ogrn;
    }

    /**
     * @param null|string $ogrn
     * @return ShareholderUL
     */
    public function setOgrn(?string $ogrn): ShareholderUL
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
     * @return ShareholderUL
     */
    public function setInn(?string $inn): ShareholderUL
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
     * @return ShareholderUL
     */
    public function setFullName(?string $fullName): ShareholderUL
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     * @return ShareholderUL
     */
    public function setAddress(?string $address): ShareholderUL
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getVotingSharesPercent(): ?float
    {
        return $this->votingSharesPercent;
    }

    /**
     * @param float|null $votingSharesPercent
     * @return ShareholderUL
     */
    public function setVotingSharesPercent(?float $votingSharesPercent): ShareholderUL
    {
        $this->votingSharesPercent = $votingSharesPercent;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getCapitalSharesPercent(): ?float
    {
        return $this->capitalSharesPercent;
    }

    /**
     * @param float|null $capitalSharesPercent
     * @return ShareholderUL
     */
    public function setCapitalSharesPercent(?float $capitalSharesPercent): ShareholderUL
    {
        $this->capitalSharesPercent = $capitalSharesPercent;
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
     * @return ShareholderUL
     */
    public function setDate(?\DateTimeImmutable $date): ShareholderUL
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

        if (array_key_exists('ogrn', $data))
            $result->setOgrn((string)$data['ogrn']);

        if (array_key_exists('inn', $data))
            $result->setInn((string)$data['inn']);

        if (array_key_exists('fullName', $data))
            $result->setFullName((string)$data['fullName']);

        if (array_key_exists('address', $data))
            $result->setAddress((string)$data['address']);

        if (array_key_exists('votingSharesPercent', $data))
            $result->setVotingSharesPercent((float)$data['votingSharesPercent']);

        if (array_key_exists('capitalSharesPercent', $data))
            $result->setCapitalSharesPercent((float)$data['capitalSharesPercent']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}
