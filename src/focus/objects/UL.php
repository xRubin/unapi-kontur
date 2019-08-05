<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\definitions\LegalAddress;
use unapi\kontur\focus\definitions\LegalName;

class UL implements DtoInterface
{
    /** @var string */
    private $kpp;
    /** @var string */
    private $okpo;
    /** @var string */
    private $okato;
    /** @var string */
    private $okfs;
    /** @var string */
    private $oktmo;
    /** @var string */
    private $okogu;
    /** @var string */
    private $okopf;
    /** @var string */
    private $opf;
    /** @var LegalName */
    private $legalName;
    /** @var LegalAddress */
    private $legalAddress;
    /** @var Branches */
    private $branches;
    /** @var StatusUL */
    private $status;
    /** @var \DateTimeInterface */
    private $registrationDate;
    /** @var \DateTimeInterface */
    private $dissolutionDate;
    /** @var Heads */
    private $heads;
    /** @var ManagementCompanies */
    private $managementCompanies;
    /** @var History */
    private $history;

    /**
     * @return string
     */
    public function getKpp(): string
    {
        return $this->kpp;
    }

    /**
     * @param string $kpp
     * @return UL
     */
    public function setKpp(string $kpp): UL
    {
        $this->kpp = $kpp;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkpo(): string
    {
        return $this->okpo;
    }

    /**
     * @param string $okpo
     * @return UL
     */
    public function setOkpo(string $okpo): UL
    {
        $this->okpo = $okpo;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkato(): string
    {
        return $this->okato;
    }

    /**
     * @param string $okato
     * @return UL
     */
    public function setOkato(string $okato): UL
    {
        $this->okato = $okato;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkfs(): string
    {
        return $this->okfs;
    }

    /**
     * @param string $okfs
     * @return UL
     */
    public function setOkfs(string $okfs): UL
    {
        $this->okfs = $okfs;
        return $this;
    }

    /**
     * @return string
     */
    public function getOktmo(): string
    {
        return $this->oktmo;
    }

    /**
     * @param string $oktmo
     * @return UL
     */
    public function setOktmo(string $oktmo): UL
    {
        $this->oktmo = $oktmo;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkogu(): string
    {
        return $this->okogu;
    }

    /**
     * @param string $okogu
     * @return UL
     */
    public function setOkogu(string $okogu): UL
    {
        $this->okogu = $okogu;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkopf(): string
    {
        return $this->okopf;
    }

    /**
     * @param string $okopf
     * @return UL
     */
    public function setOkopf(string $okopf): UL
    {
        $this->okopf = $okopf;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpf(): string
    {
        return $this->opf;
    }

    /**
     * @param string $opf
     * @return UL
     */
    public function setOpf(string $opf): UL
    {
        $this->opf = $opf;
        return $this;
    }

    /**
     * @return LegalName
     */
    public function getLegalName(): LegalName
    {
        return $this->legalName;
    }

    /**
     * @param LegalName $legalName
     * @return UL
     */
    public function setLegalName(LegalName $legalName): UL
    {
        $this->legalName = $legalName;
        return $this;
    }

    /**
     * @return LegalAddress
     */
    public function getLegalAddress(): LegalAddress
    {
        return $this->legalAddress;
    }

    /**
     * @param LegalAddress $legalAddress
     * @return UL
     */
    public function setLegalAddress(LegalAddress $legalAddress): UL
    {
        $this->legalAddress = $legalAddress;
        return $this;
    }

    /**
     * @return Branches
     */
    public function getBranches(): Branches
    {
        return $this->branches;
    }

    /**
     * @param Branches $branches
     * @return UL
     */
    public function setBranches(Branches $branches): UL
    {
        $this->branches = $branches;
        return $this;
    }

    /**
     * @return StatusUL
     */
    public function getStatus(): StatusUL
    {
        return $this->status;
    }

    /**
     * @param StatusUL $status
     * @return UL
     */
    public function setStatus(StatusUL $status): UL
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getRegistrationDate(): \DateTimeInterface
    {
        return $this->registrationDate;
    }

    /**
     * @param \DateTimeInterface $registrationDate
     * @return UL
     */
    public function setRegistrationDate(\DateTimeInterface $registrationDate): UL
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDissolutionDate(): \DateTimeInterface
    {
        return $this->dissolutionDate;
    }

    /**
     * @param \DateTimeInterface $dissolutionDate
     * @return UL
     */
    public function setDissolutionDate(\DateTimeInterface $dissolutionDate): UL
    {
        $this->dissolutionDate = $dissolutionDate;
        return $this;
    }

    /**
     * @return Heads
     */
    public function getHeads(): Heads
    {
        return $this->heads;
    }

    /**
     * @param Heads $heads
     * @return UL
     */
    public function setHeads(Heads $heads): UL
    {
        $this->heads = $heads;
        return $this;
    }

    /**
     * @return ManagementCompanies
     */
    public function getManagementCompanies(): ManagementCompanies
    {
        return $this->managementCompanies;
    }

    /**
     * @param ManagementCompanies $managementCompanies
     * @return UL
     */
    public function setManagementCompanies(ManagementCompanies $managementCompanies): UL
    {
        $this->managementCompanies = $managementCompanies;
        return $this;
    }

    /**
     * @return History
     */
    public function getHistory(): History
    {
        return $this->history;
    }

    /**
     * @param History $history
     * @return UL
     */
    public function setHistory(History $history): UL
    {
        $this->history = $history;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('kpp', $data))
            $result->setKpp($data['kpp']);

        if (array_key_exists('okpo', $data))
            $result->setOkpo($data['okpo']);

        if (array_key_exists('okato', $data))
            $result->setOkato($data['okato']);

        if (array_key_exists('okfs', $data))
            $result->setOkfs($data['okfs']);

        if (array_key_exists('oktmo', $data))
            $result->setOktmo($data['oktmo']);

        if (array_key_exists('okogu', $data))
            $result->setOkogu($data['okogu']);

        if (array_key_exists('okopf', $data))
            $result->setOkopf($data['okopf']);

        if (array_key_exists('opf', $data))
            $result->setOpf($data['opf']);

        if (array_key_exists('legalName', $data))
            $result->setLegalName(LegalName::toDto($data['legalName']));

        if (array_key_exists('legalAddress', $data))
            $result->setLegalAddress(LegalAddress::toDto($data['legalAddress']));

        if (array_key_exists('branches', $data))
            $result->setBranches(Branches::toDto($data['branches']));

        if (array_key_exists('status', $data))
            $result->setStatus(StatusUL::toDto($data['status']));

        if (array_key_exists('registrationDate', $data))
            $result->setRegistrationDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['registrationDate']));

        if (array_key_exists('dissolutionDate', $data))
            $result->setDissolutionDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['dissolutionDate']));

        if (array_key_exists('heads', $data))
            $result->setHeads(Heads::toDto($data['heads']));

        if (array_key_exists('managementCompanies', $data))
            $result->setManagementCompanies(ManagementCompanies::toDto($data['managementCompanies']));

        if (array_key_exists('history', $data))
            $result->setHistory(History::toDto($data['history']));

        return $result;
    }
}