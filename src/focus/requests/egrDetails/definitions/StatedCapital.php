<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Date;

class StatedCapital implements DtoInterface
{
    /** @var float|null */
    private $sum;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * @return float|null
     */
    public function getSum(): ?float
    {
        return $this->sum;
    }

    /**
     * @param float|null $sum
     * @return StatedCapital
     */
    public function setSum(?float $sum): StatedCapital
    {
        $this->sum = $sum;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable|null $date
     * @return StatedCapital
     */
    public function setDate(?\DateTimeImmutable $date): StatedCapital
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('sum', $data))
            $result->setSum((float)$data['sum']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}
