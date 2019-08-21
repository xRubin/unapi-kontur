<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;

class History implements DtoInterface
{
    /** @var KppsArray */
    private $kpps;
    /** @var LegalNamesArray */
    private $legalNames;
    /** @var LegalAddressesArray */
    private $legalAddresses;
    /** @var BranchesArray */
    private $branches;
    /** @var ManagementCompaniesArray */
    private $managementCompanies;
    /** @var HeadsArray */
    private $heads;

    /**
     * History constructor.
     * @param KppsArray $kpps
     * @param LegalNamesArray $legalNames
     * @param LegalAddressesArray $legalAddresses
     * @param BranchesArray $branches
     * @param ManagementCompaniesArray $managementCompanies
     * @param HeadsArray $heads
     */
    public function __construct(KppsArray $kpps, LegalNamesArray $legalNames, LegalAddressesArray $legalAddresses, BranchesArray $branches, ManagementCompaniesArray $managementCompanies, HeadsArray $heads)
    {
        $this->kpps = $kpps;
        $this->legalNames = $legalNames;
        $this->legalAddresses = $legalAddresses;
        $this->branches = $branches;
        $this->managementCompanies = $managementCompanies;
        $this->heads = $heads;
    }

    /**
     * @return KppsArray
     */
    public function getKpps(): KppsArray
    {
        return $this->kpps;
    }

    /**
     * @return LegalNamesArray
     */
    public function getLegalNames(): LegalNamesArray
    {
        return $this->legalNames;
    }

    /**
     * @return LegalAddressesArray
     */
    public function getLegalAddresses(): LegalAddressesArray
    {
        return $this->legalAddresses;
    }

    /**
     * @return BranchesArray
     */
    public function getBranches(): BranchesArray
    {
        return $this->branches;
    }

    /**
     * @return ManagementCompaniesArray
     */
    public function getManagementCompanies(): ManagementCompaniesArray
    {
        return $this->managementCompanies;
    }

    /**
     * @return HeadsArray
     */
    public function getHeads(): HeadsArray
    {
        return $this->heads;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            KppsArray::toDto(array_key_exists('kpps', $data) ? $data['kpps'] : []),
            LegalNamesArray::toDto(array_key_exists('legalNames', $data) ? $data['legalNames'] : []),
            LegalAddressesArray::toDto(array_key_exists('legalAddresses', $data) ? $data['legalAddresses'] : []),
            BranchesArray::toDto(array_key_exists('branches', $data) ? $data['branches'] : []),
            ManagementCompaniesArray::toDto(array_key_exists('managementCompanies', $data) ? $data['managementCompanies'] : []),
            HeadsArray::toDto(array_key_exists('heads', $data) ? $data['heads'] : [])
        );
    }
}