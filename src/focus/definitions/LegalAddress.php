<?php

namespace unapi\kontur\focus\definitions;

use unapi\interfaces\DtoInterface;

class LegalAddress implements DtoInterface
{
    /** @var ParsedAddressRF */
    private $parsedAddressRF;
    /** @var \DateTimeInterface */
    private $date;
    /** @var \DateTimeInterface */
    private $firstDate;

    /**
     * LegalAddress constructor.
     * @param ParsedAddressRF $parsedAddressRF
     * @param \DateTimeInterface $date
     * @param \DateTimeInterface $firstDate
     */
    public function __construct(ParsedAddressRF $parsedAddressRF, \DateTimeInterface $date, \DateTimeInterface $firstDate)
    {
        $this->parsedAddressRF = $parsedAddressRF;
        $this->date = $date;
        $this->firstDate = $firstDate;
    }

    /**
     * @return ParsedAddressRF
     */
    public function getParsedAddressRF(): ParsedAddressRF
    {
        return $this->parsedAddressRF;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getFirstDate(): \DateTimeInterface
    {
        return $this->firstDate;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            ParsedAddressRF::toDto($data['parsedAddressRF']),
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date']),
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['firstDate'])
        );
    }
}
