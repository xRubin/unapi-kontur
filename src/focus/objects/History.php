<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;

class History implements DtoInterface
{
    /** @var Kpps */
    private $kpps;
    /** @var LegalNames */
    private $legalNames;
    /** @var LegalAddresses */
    private $legalAddresses;
    /** @var Branches */
    private $branches;
    /** @var ManagementCompanies */
    private $managementCompanies;
    /** @var Heads */
    private $heads;

    /**
     * History constructor.
     * @param Kpps $kpps
     * @param LegalNames $legalNames
     * @param LegalAddresses $legalAddresses
     * @param Branches $branches
     * @param ManagementCompanies $managementCompanies
     * @param Heads $heads
     */
    public function __construct(Kpps $kpps, LegalNames $legalNames, LegalAddresses $legalAddresses, Branches $branches, ManagementCompanies $managementCompanies, Heads $heads)
    {
        $this->kpps = $kpps;
        $this->legalNames = $legalNames;
        $this->legalAddresses = $legalAddresses;
        $this->branches = $branches;
        $this->managementCompanies = $managementCompanies;
        $this->heads = $heads;
    }

    /**
     * @return Kpps
     */
    public function getKpps(): Kpps
    {
        return $this->kpps;
    }

    /**
     * @param Kpps $kpps
     * @return History
     */
    public function setKpps(Kpps $kpps): History
    {
        $this->kpps = $kpps;
        return $this;
    }

    /**
     * @return LegalNames
     */
    public function getLegalNames(): LegalNames
    {
        return $this->legalNames;
    }

    /**
     * @param LegalNames $legalNames
     * @return History
     */
    public function setLegalNames(LegalNames $legalNames): History
    {
        $this->legalNames = $legalNames;
        return $this;
    }

    /**
     * @return LegalAddresses
     */
    public function getLegalAddresses(): LegalAddresses
    {
        return $this->legalAddresses;
    }

    /**
     * @param LegalAddresses $legalAddresses
     * @return History
     */
    public function setLegalAddresses(LegalAddresses $legalAddresses): History
    {
        $this->legalAddresses = $legalAddresses;
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
     * @return History
     */
    public function setBranches(Branches $branches): History
    {
        $this->branches = $branches;
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
     * @return History
     */
    public function setManagementCompanies(ManagementCompanies $managementCompanies): History
    {
        $this->managementCompanies = $managementCompanies;
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
     * @return History
     */
    public function setHeads(Heads $heads): History
    {
        $this->heads = $heads;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            Kpps::toDto(array_key_exists('kpps', $data) ? $data['kpps'] : []),
            LegalNames::toDto(array_key_exists('legalNames', $data) ? $data['legalNames'] : []),
            LegalAddresses::toDto(array_key_exists('legalAddresses', $data) ? $data['legalAddresses'] : []),
            Branches::toDto(array_key_exists('branches', $data) ? $data['branches'] : []),
            ManagementCompanies::toDto(array_key_exists('managementCompanies', $data) ? $data['managementCompanies'] : []),
            Heads::toDto(array_key_exists('heads', $data) ? $data['heads'] : [])
        );
    }
}