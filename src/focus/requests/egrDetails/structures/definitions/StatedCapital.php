<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;

class StatedCapital implements DtoInterface
{
    /** @var float */
    private $sum;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * StatedCapital constructor.
     * @param float $sum
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(float $sum, ?\DateTimeImmutable $date)
    {
        $this->sum = $sum;
        $this->date = $date;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (float)$data['sum'],
            \DateTimeImmutable::createFromFormat('Y-m-d', $data['date'])
        );
    }
}
