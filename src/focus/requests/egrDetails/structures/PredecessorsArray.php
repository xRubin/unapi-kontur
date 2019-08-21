<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;

class PredecessorsArray implements \IteratorAggregate, DtoInterface
{
    /** @var Predecessor[] */
    private $list;

    /**
     * Predecessors constructor.
     * @param Predecessor[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function getIterator() {
        return new \ArrayIterator($this->list);
    }
    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(array_map([Predecessor::class, 'toDto'], $data));
    }
}