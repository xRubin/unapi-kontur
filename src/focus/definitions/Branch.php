<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class Branch implements DtoInterface
{
    /** @var string */
    private $name;
    /** @var ParsedAddressRF|null */
    private $parsedAddressRF;
    /** @var ForeignAddress|null */
    private $foreignAddress;
    /** @var \DateTimeInterface */
    private $date;

    /**
     * Branch constructor.
     * @param string $name
     * @param \DateTimeInterface $date
     */
    public function __construct(string $name, \DateTimeInterface $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return null|ParsedAddressRF
     */
    public function getParsedAddressRF(): ?ParsedAddressRF
    {
        return $this->parsedAddressRF;
    }

    /**
     * @param null|ParsedAddressRF $parsedAddressRF
     * @return Branch
     */
    public function setParsedAddressRF(?ParsedAddressRF $parsedAddressRF): Branch
    {
        $this->parsedAddressRF = $parsedAddressRF;
        return $this;
    }

    /**
     * @return null|ForeignAddress
     */
    public function getForeignAddress(): ?ForeignAddress
    {
        return $this->foreignAddress;
    }

    /**
     * @param null|ForeignAddress $foreignAddress
     * @return Branch
     */
    public function setForeignAddress(?ForeignAddress $foreignAddress): Branch
    {
        $this->foreignAddress = $foreignAddress;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self(
            (string)$data['name'],
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date'])
        );

        if (array_key_exists('parsedAddressRF', $data))
            $result->setParsedAddressRF(ParsedAddressRF::toDto($data['parsedAddressRF']));

        if (array_key_exists('foreignAddress', $data))
            $result->setForeignAddress(ForeignAddress::toDto($data['foreignAddress']));

        return $result;
    }
}