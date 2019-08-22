<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class ShareholderOther implements DtoInterface
{
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
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param null|string $fullName
     * @return ShareholderOther
     */
    public function setFullName(?string $fullName): ShareholderOther
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
     * @return ShareholderOther
     */
    public function setAddress(?string $address): ShareholderOther
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
     * @return ShareholderOther
     */
    public function setVotingSharesPercent(?float $votingSharesPercent): ShareholderOther
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
     * @return ShareholderOther
     */
    public function setCapitalSharesPercent(?float $capitalSharesPercent): ShareholderOther
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
     * @return ShareholderOther
     */
    public function setDate(?\DateTimeImmutable $date): ShareholderOther
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
    }
}
