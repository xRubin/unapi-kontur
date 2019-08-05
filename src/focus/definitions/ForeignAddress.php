<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class ForeignAddress implements DtoInterface
{
    /** @var string */
    private $countryName;
    /** @var string */
    private $addressString;

    /**
     * ForeignAddress constructor.
     * @param string $countryName
     * @param string $addressString
     */
    public function __construct(string $countryName, string $addressString)
    {
        $this->countryName = $countryName;
        $this->addressString = $addressString;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @return string
     */
    public function getAddressString(): string
    {
        return $this->addressString;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (string)$data['countryName'],
            (string)$data['addressString']
        );
    }
}