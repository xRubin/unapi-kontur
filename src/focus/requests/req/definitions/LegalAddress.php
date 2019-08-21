<?php

namespace unapi\kontur\focus\requests\req\definitions;

use unapi\interfaces\DtoInterface;

class LegalAddress implements DtoInterface
{
    /** @var ParsedAddressRF */
    private $parsedAddressRF;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * LegalAddress constructor.
     * @param ParsedAddressRF $parsedAddressRF
     * @param \DateTimeImmutable|null $date
     * @param \DateTimeImmutable|null $firstDate
     */
    public function __construct(ParsedAddressRF $parsedAddressRF, ?\DateTimeImmutable $date, ?\DateTimeImmutable $firstDate)
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
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFirstDate(): ?\DateTimeImmutable
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
            Date::convert($data['date']),
            Date::convert($data['firstDate'])
        );
    }
}
