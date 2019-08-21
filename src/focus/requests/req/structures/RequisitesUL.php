<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\req\definitions\LegalAddress;
use unapi\kontur\focus\requests\req\definitions\LegalName;
use unapi\kontur\focus\requests\req\definitions\Date;

class RequisitesUL implements DtoInterface
{
    /** @var string|null */
    private $kpp;
    /** @var string|null */
    private $okpo;
    /** @var string|null */
    private $okato;
    /** @var string|null */
    private $okfs;
    /** @var string|null */
    private $oktmo;
    /** @var string|null */
    private $okogu;
    /** @var string|null */
    private $okopf;
    /** @var string|null */
    private $opf;
    /** @var LegalName|null */
    private $legalName;
    /** @var LegalAddress|null */
    private $legalAddress;
    /** @var BranchesArray */
    private $branches;
    /** @var StatusUL|null */
    private $status;
    /** @var \DateTimeImmutable|null */
    private $registrationDate;
    /** @var \DateTimeImmutable|null */
    private $dissolutionDate;
    /** @var HeadsArray */
    private $heads;
    /** @var ManagementCompaniesArray */
    private $managementCompanies;
    /** @var History|null */
    private $history;

    /**
     * @return null|string
     */
    public function getKpp(): ?string
    {
        return $this->kpp;
    }

    /**
     * @param null|string $kpp
     * @return RequisitesUL
     */
    public function setKpp(?string $kpp): RequisitesUL
    {
        $this->kpp = $kpp;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkpo(): ?string
    {
        return $this->okpo;
    }

    /**
     * @param null|string $okpo
     * @return RequisitesUL
     */
    public function setOkpo(?string $okpo): RequisitesUL
    {
        $this->okpo = $okpo;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkato(): ?string
    {
        return $this->okato;
    }

    /**
     * @param null|string $okato
     * @return RequisitesUL
     */
    public function setOkato(?string $okato): RequisitesUL
    {
        $this->okato = $okato;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkfs(): ?string
    {
        return $this->okfs;
    }

    /**
     * @param null|string $okfs
     * @return RequisitesUL
     */
    public function setOkfs(?string $okfs): RequisitesUL
    {
        $this->okfs = $okfs;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    /**
     * @param null|string $oktmo
     * @return RequisitesUL
     */
    public function setOktmo(?string $oktmo): RequisitesUL
    {
        $this->oktmo = $oktmo;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkogu(): ?string
    {
        return $this->okogu;
    }

    /**
     * @param null|string $okogu
     * @return RequisitesUL
     */
    public function setOkogu(?string $okogu): RequisitesUL
    {
        $this->okogu = $okogu;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkopf(): ?string
    {
        return $this->okopf;
    }

    /**
     * @param null|string $okopf
     * @return RequisitesUL
     */
    public function setOkopf(?string $okopf): RequisitesUL
    {
        $this->okopf = $okopf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOpf(): ?string
    {
        return $this->opf;
    }

    /**
     * @param null|string $opf
     * @return RequisitesUL
     */
    public function setOpf(?string $opf): RequisitesUL
    {
        $this->opf = $opf;
        return $this;
    }

    /**
     * @return null|LegalName
     */
    public function getLegalName(): ?LegalName
    {
        return $this->legalName;
    }

    /**
     * @param null|LegalName $legalName
     * @return RequisitesUL
     */
    public function setLegalName(?LegalName $legalName): RequisitesUL
    {
        $this->legalName = $legalName;
        return $this;
    }

    /**
     * @return null|LegalAddress
     */
    public function getLegalAddress(): ?LegalAddress
    {
        return $this->legalAddress;
    }

    /**
     * @param null|LegalAddress $legalAddress
     * @return RequisitesUL
     */
    public function setLegalAddress(?LegalAddress $legalAddress): RequisitesUL
    {
        $this->legalAddress = $legalAddress;
        return $this;
    }

    /**
     * @return BranchesArray
     */
    public function getBranches(): BranchesArray
    {
        return $this->branches;
    }

    /**
     * @param BranchesArray $branches
     * @return RequisitesUL
     */
    public function setBranches(BranchesArray $branches): RequisitesUL
    {
        $this->branches = $branches;
        return $this;
    }

    /**
     * @return null|StatusUL
     */
    public function getStatus(): ?StatusUL
    {
        return $this->status;
    }

    /**
     * @param null|StatusUL $status
     * @return RequisitesUL
     */
    public function setStatus(?StatusUL $status): RequisitesUL
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getRegistrationDate(): ?\DateTimeImmutable
    {
        return $this->registrationDate;
    }

    /**
     * @param \DateTimeImmutable|null $registrationDate
     * @return RequisitesUL
     */
    public function setRegistrationDate(?\DateTimeImmutable $registrationDate): RequisitesUL
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDissolutionDate(): ?\DateTimeImmutable
    {
        return $this->dissolutionDate;
    }

    /**
     * @param \DateTimeImmutable|null $dissolutionDate
     * @return RequisitesUL
     */
    public function setDissolutionDate(?\DateTimeImmutable $dissolutionDate): RequisitesUL
    {
        $this->dissolutionDate = $dissolutionDate;
        return $this;
    }

    /**
     * @return HeadsArray
     */
    public function getHeads(): HeadsArray
    {
        return $this->heads;
    }

    /**
     * @param HeadsArray $heads
     * @return RequisitesUL
     */
    public function setHeads(HeadsArray $heads): RequisitesUL
    {
        $this->heads = $heads;
        return $this;
    }

    /**
     * @return ManagementCompaniesArray
     */
    public function getManagementCompanies(): ManagementCompaniesArray
    {
        return $this->managementCompanies;
    }

    /**
     * @param ManagementCompaniesArray $managementCompanies
     * @return RequisitesUL
     */
    public function setManagementCompanies(ManagementCompaniesArray $managementCompanies): RequisitesUL
    {
        $this->managementCompanies = $managementCompanies;
        return $this;
    }

    /**
     * @return null|History
     */
    public function getHistory(): ?History
    {
        return $this->history;
    }

    /**
     * @param null|History $history
     * @return RequisitesUL
     */
    public function setHistory(?History $history): RequisitesUL
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
            $result->setBranches(BranchesArray::toDto($data['branches']));

        if (array_key_exists('status', $data))
            $result->setStatus(StatusUL::toDto($data['status']));

        if (array_key_exists('registrationDate', $data))
            $result->setRegistrationDate(Date::convert($data['registrationDate']));

        if (array_key_exists('dissolutionDate', $data))
            $result->setDissolutionDate(Date::convert($data['dissolutionDate']));

        if (array_key_exists('heads', $data))
            $result->setHeads(HeadsArray::toDto($data['heads']));

        if (array_key_exists('managementCompanies', $data))
            $result->setManagementCompanies(ManagementCompaniesArray::toDto($data['managementCompanies']));

        if (array_key_exists('history', $data))
            $result->setHistory(History::toDto($data['history']));

        return $result;
    }
}