<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\definitions\Head;

class Heads implements \IteratorAggregate, DtoInterface
{
    /** @var Head[] */
    private $list;

    /**
     * Heads constructor.
     * @param Head[] $list
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
        return new self(array_map([Head::class, 'toDto'], $data));
    }
}