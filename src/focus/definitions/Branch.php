<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class Branch implements DtoInterface
{
    /** @var string|null */
    private $name;
    /** @var ParsedAddressRF|null */
    private $parsedAddressRF;
    /** @var ForeignAddress|null */
    private $foreignAddress;
    /** @var \DateTimeInterface|null */
    private $date;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Branch
     */
    public function setName(?string $name): Branch
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface|null $date
     * @return Branch
     */
    public function setDate(?\DateTimeInterface $date): Branch
    {
        $this->date = $date;
        return $this;
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
        $result = new self();

        if (array_key_exists('name', $data))
            $result->setName($data['name']);

        if (array_key_exists('date', $data))
            $result->setDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['date']));

        if (array_key_exists('parsedAddressRF', $data))
            $result->setParsedAddressRF(ParsedAddressRF::toDto($data['parsedAddressRF']));

        if (array_key_exists('foreignAddress', $data))
            $result->setForeignAddress(ForeignAddress::toDto($data['foreignAddress']));

        return $result;
    }
}