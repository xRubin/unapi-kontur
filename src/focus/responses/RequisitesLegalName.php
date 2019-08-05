<?php

namespace unapi\kontur\focus\responses;

use unapi\interfaces\DtoInterface;

class RequisitesLegalName implements DtoInterface
{
    /** @var string */
    private $short;
    /** @var string */
    private $full;
    /** @var \DateTimeInterface */
    private $date;

    /**
     * RequisitesLegalName constructor.
     * @param string $short
     * @param string $full
     * @param \DateTimeInterface $date
     */
    public function __construct(string $short, string $full, \DateTimeInterface $date)
    {
        $this->short = $short;
        $this->full = $full;
        $this->date = $date;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (string)$data['short'],
            (string)$data['full'],
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date'])
        );
    }
}