<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class Share implements DtoInterface
{
    /** @var float|null */
    private $sum;
    /** @var float|null */
    private $percentagePlain;
    /** @var int|null */
    private $percentageNominator;
    /** @var int|null */
    private $percentageDenominator;

    /**
     * @return float|null
     */
    public function getSum(): ?float
    {
        return $this->sum;
    }

    /**
     * @param float|null $sum
     * @return Share
     */
    public function setSum(?float $sum): Share
    {
        $this->sum = $sum;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPercentagePlain(): ?float
    {
        return $this->percentagePlain;
    }

    /**
     * @param float|null $percentagePlain
     * @return Share
     */
    public function setPercentagePlain(?float $percentagePlain): Share
    {
        $this->percentagePlain = $percentagePlain;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPercentageNominator(): ?int
    {
        return $this->percentageNominator;
    }

    /**
     * @param int|null $percentageNominator
     * @return Share
     */
    public function setPercentageNominator(?int $percentageNominator): Share
    {
        $this->percentageNominator = $percentageNominator;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPercentageDenominator(): ?int
    {
        return $this->percentageDenominator;
    }

    /**
     * @param int|null $percentageDenominator
     * @return Share
     */
    public function setPercentageDenominator(?int $percentageDenominator): Share
    {
        $this->percentageDenominator = $percentageDenominator;
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

        if (array_key_exists('percentagePlain', $data))
            $result->setSum((float)$data['percentagePlain']);

        if (array_key_exists('percentageNominator', $data))
            $result->setSum((int)$data['percentageNominator']);

        if (array_key_exists('percentageDenominator', $data))
            $result->setSum((int)$data['percentageDenominator']);

        return $result;
    }
}
