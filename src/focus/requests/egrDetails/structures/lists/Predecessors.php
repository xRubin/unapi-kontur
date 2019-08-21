<?php

namespace unapi\kontur\focus\objects\lists;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Predecessor;

class Predecessors implements \IteratorAggregate, DtoInterface
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