<?php

namespace unapi\kontur\focus\objects\lists;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\definitions\FounderUL;

class FoundersUL implements \IteratorAggregate, DtoInterface
{
    /** @var FounderUL[] */
    private $list;

    /**
     * FoundersUL constructor.
     * @param FounderUL[] $list
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
        return new self(array_map([FounderUL::class, 'toDto'], $data));
    }
}