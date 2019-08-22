<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class ShareholderFL implements DtoInterface
{
    /** @var string|null */
    private $fio;
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
    public function getFio(): ?string
    {
        return $this->fio;
    }

    /**
     * @param null|string $fio
     * @return ShareholderFL
     */
    public function setFio(?string $fio): ShareholderFL
    {
        $this->fio = $fio;
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
     * @return ShareholderFL
     */
    public function setAddress(?string $address): ShareholderFL
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
     * @return ShareholderFL
     */
    public function setVotingSharesPercent(?float $votingSharesPercent): ShareholderFL
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
     * @return ShareholderFL
     */
    public function setCapitalSharesPercent(?float $capitalSharesPercent): ShareholderFL
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
     * @return ShareholderFL
     */
    public function setDate(?\DateTimeImmutable $date): ShareholderFL
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

        if (array_key_exists('fio', $data))
            $result->setFio((string)$data['fio']);

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
