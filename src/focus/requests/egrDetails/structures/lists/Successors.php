<?php

namespace unapi\kontur\focus\objects\lists;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Successor;

class Successors implements \IteratorAggregate, DtoInterface
{
    /** @var Successor[] */
    private $list;

    /**
     * Successors constructor.
     * @param Successor[] $list
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
        return new self(array_map([Successor::class, 'toDto'], $data));
    }
}