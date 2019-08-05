<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class ParsedAddressRF implements DtoInterface
{
    /** @var string|null */
    private $zipCode;
    /** @var string|null */
    private $regionCode;
    /** @var Toponym|null */
    private $regionName;
    /** @var Toponym|null */
    private $district;
    /** @var Toponym|null */
    private $city;
    /** @var Toponym|null */
    private $settlement;
    /** @var Toponym|null */
    private $street;
    /** @var Toponym|null */
    private $house;
    /** @var Toponym|null */
    private $bulk;
    /** @var Toponym|null */
    private $flat;
    /** @var string|null */
    private $kladrCode;
    /** @var string|null */
    private $houseRaw;
    /** @var string|null */
    private $bulkRaw;
    /** @var string|null */
    private $flatRaw;

    /**
     * @return null|string
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @param null|string $zipCode
     * @return ParsedAddressRF
     */
    public function setZipCode(?string $zipCode): ParsedAddressRF
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRegionCode(): ?string
    {
        return $this->regionCode;
    }

    /**
     * @param null|string $regionCode
     * @return ParsedAddressRF
     */
    public function setRegionCode(?string $regionCode): ParsedAddressRF
    {
        $this->regionCode = $regionCode;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getRegionName(): ?Toponym
    {
        return $this->regionName;
    }

    /**
     * @param null|Toponym $regionName
     * @return ParsedAddressRF
     */
    public function setRegionName(?Toponym $regionName): ParsedAddressRF
    {
        $this->regionName = $regionName;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getDistrict(): ?Toponym
    {
        return $this->district;
    }

    /**
     * @param null|Toponym $district
     * @return ParsedAddressRF
     */
    public function setDistrict(?Toponym $district): ParsedAddressRF
    {
        $this->district = $district;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getCity(): ?Toponym
    {
        return $this->city;
    }

    /**
     * @param null|Toponym $city
     * @return ParsedAddressRF
     */
    public function setCity(?Toponym $city): ParsedAddressRF
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getSettlement(): ?Toponym
    {
        return $this->settlement;
    }

    /**
     * @param null|Toponym $settlement
     * @return ParsedAddressRF
     */
    public function setSettlement(?Toponym $settlement): ParsedAddressRF
    {
        $this->settlement = $settlement;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getStreet(): ?Toponym
    {
        return $this->street;
    }

    /**
     * @param null|Toponym $street
     * @return ParsedAddressRF
     */
    public function setStreet(?Toponym $street): ParsedAddressRF
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getHouse(): ?Toponym
    {
        return $this->house;
    }

    /**
     * @param null|Toponym $house
     * @return ParsedAddressRF
     */
    public function setHouse(?Toponym $house): ParsedAddressRF
    {
        $this->house = $house;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getBulk(): ?Toponym
    {
        return $this->bulk;
    }

    /**
     * @param null|Toponym $bulk
     * @return ParsedAddressRF
     */
    public function setBulk(?Toponym $bulk): ParsedAddressRF
    {
        $this->bulk = $bulk;
        return $this;
    }

    /**
     * @return null|Toponym
     */
    public function getFlat(): ?Toponym
    {
        return $this->flat;
    }

    /**
     * @param null|Toponym $flat
     * @return ParsedAddressRF
     */
    public function setFlat(?Toponym $flat): ParsedAddressRF
    {
        $this->flat = $flat;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getKladrCode(): ?string
    {
        return $this->kladrCode;
    }

    /**
     * @param null|string $kladrCode
     * @return ParsedAddressRF
     */
    public function setKladrCode(?string $kladrCode): ParsedAddressRF
    {
        $this->kladrCode = $kladrCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getHouseRaw(): ?string
    {
        return $this->houseRaw;
    }

    /**
     * @param null|string $houseRaw
     * @return ParsedAddressRF
     */
    public function setHouseRaw(?string $houseRaw): ParsedAddressRF
    {
        $this->houseRaw = $houseRaw;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBulkRaw(): ?string
    {
        return $this->bulkRaw;
    }

    /**
     * @param null|string $bulkRaw
     * @return ParsedAddressRF
     */
    public function setBulkRaw(?string $bulkRaw): ParsedAddressRF
    {
        $this->bulkRaw = $bulkRaw;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFlatRaw(): ?string
    {
        return $this->flatRaw;
    }

    /**
     * @param null|string $flatRaw
     * @return ParsedAddressRF
     */
    public function setFlatRaw(?string $flatRaw): ParsedAddressRF
    {
        $this->flatRaw = $flatRaw;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('zipCode', $data))
            $result->setZipCode($data['zipCode']);

        if (array_key_exists('regionCode', $data))
            $result->setRegionCode($data['regionCode']);

        if (array_key_exists('regionName', $data))
            $result->setRegionName(Toponym::toDto($data['regionName']));

        if (array_key_exists('district', $data))
            $result->setDistrict(Toponym::toDto($data['district']));

        if (array_key_exists('city', $data))
            $result->setCity(Toponym::toDto($data['city']));

        if (array_key_exists('settlement', $data))
            $result->setSettlement(Toponym::toDto($data['settlement']));

        if (array_key_exists('street', $data))
            $result->setStreet(Toponym::toDto($data['street']));

        if (array_key_exists('house', $data))
            $result->setHouse(Toponym::toDto($data['house']));

        if (array_key_exists('bulk', $data))
            $result->setBulk(Toponym::toDto($data['bulk']));

        if (array_key_exists('flat', $data))
            $result->setFlat(Toponym::toDto($data['flat']));

        if (array_key_exists('kladrCode', $data))
            $result->setKladrCode($data['kladrCode']);

        if (array_key_exists('houseRaw', $data))
            $result->setHouseRaw($data['houseRaw']);

        if (array_key_exists('bulkRaw', $data))
            $result->setBulkRaw($data['bulkRaw']);

        if (array_key_exists('flatRaw', $data))
            $result->setFlatRaw($data['flatRaw']);

        return $result;
    }
}
