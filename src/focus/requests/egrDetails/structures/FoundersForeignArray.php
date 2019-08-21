<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\FounderForeign;

class FoundersForeignArray implements \IteratorAggregate, DtoInterface
{
    /** @var FounderForeign[] */
    private $list;

    /**
     * FoundersForeign constructor.
     * @param FounderForeign[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(array_map([FounderForeign::class, 'toDto'], $data));
    }
}