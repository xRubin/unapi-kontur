<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Shareholders;

class History implements DtoInterface
{
    /** @var Shareholders */
    private $shareholders;
    /** @var StatedCapitalsArray */
    private $statedCapitals;
    /** @var FoundersFLArray */
    private $foundersFL;
    /** @var FoundersULArray */
    private $foundersUL;
    /** @var FoundersForeignArray */
    private $foundersForeign;

    /**
     * History constructor.
     * @param Shareholders $shareholders
     * @param StatedCapitalsArray $statedCapitals
     * @param FoundersFLArray $foundersFL
     * @param FoundersULArray $foundersUL
     * @param FoundersForeignArray $foundersForeign
     */
    public function __construct(Shareholders $shareholders, StatedCapitalsArray $statedCapitals, FoundersFLArray $foundersFL, FoundersULArray $foundersUL, FoundersForeignArray $foundersForeign)
    {
        $this->shareholders = $shareholders;
        $this->statedCapitals = $statedCapitals;
        $this->foundersFL = $foundersFL;
        $this->foundersUL = $foundersUL;
        $this->foundersForeign = $foundersForeign;
    }

    /**
     * @return Shareholders
     */
    public function getShareholders(): Shareholders
    {
        return $this->shareholders;
    }

    /**
     * @return StatedCapitalsArray
     */
    public function getStatedCapitals(): StatedCapitalsArray
    {
        return $this->statedCapitals;
    }

    /**
     * @return FoundersFLArray
     */
    public function getFoundersFL(): FoundersFLArray
    {
        return $this->foundersFL;
    }

    /**
     * @return FoundersULArray
     */
    public function getFoundersUL(): FoundersULArray
    {
        return $this->foundersUL;
    }

    /**
     * @return FoundersForeignArray
     */
    public function getFoundersForeign(): FoundersForeignArray
    {
        return $this->foundersForeign;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            Shareholders::toDto(array_key_exists('shareholders', $data) ? $data['shareholders'] : []),
            StatedCapitalsArray::toDto(array_key_exists('statedCapitals', $data) ? $data['statedCapitals'] : []),
            FoundersFLArray::toDto(array_key_exists('foundersFL', $data) ? $data['foundersFL'] : []),
            FoundersULArray::toDto(array_key_exists('foundersUL', $data) ? $data['foundersUL'] : []),
            FoundersForeignArray::toDto(array_key_exists('foundersForeign', $data) ? $data['foundersForeign'] : [])
        );
    }
}