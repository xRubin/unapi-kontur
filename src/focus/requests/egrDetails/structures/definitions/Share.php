<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;

class Share implements DtoInterface
{
    /** @var float */
    private $sum;
    /** @var float */
    private $percentagePlain;
    /** @var float */
    private $percentageNominator;
    /** @var float */
    private $percentageDenominator;

    /**
     * Share constructor.
     * @param float $sum
     * @param float $percentagePlain
     * @param float $percentageNominator
     * @param float $percentageDenominator
     */
    public function __construct(float $sum, float $percentagePlain, float $percentageNominator, float $percentageDenominator)
    {
        $this->sum = $sum;
        $this->percentagePlain = $percentagePlain;
        $this->percentageNominator = $percentageNominator;
        $this->percentageDenominator = $percentageDenominator;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @return float
     */
    public function getPercentagePlain(): float
    {
        return $this->percentagePlain;
    }

    /**
     * @return float
     */
    public function getPercentageNominator(): float
    {
        return $this->percentageNominator;
    }

    /**
     * @return float
     */
    public function getPercentageDenominator(): float
    {
        return $this->percentageDenominator;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (float)$data['sum'],
            (float)$data['percentagePlain'],
            (int)$data['percentageNominator'],
            (int)$data['percentageDenominator']
        );
    }
}
