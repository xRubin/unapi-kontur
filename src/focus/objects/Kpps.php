<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\definitions\KppWithDate;

class Kpps implements \IteratorAggregate, DtoInterface
{
    /** @var KppWithDate[] */
    private $list;

    /**
     * Kpps constructor.
     * @param KppWithDate[] $list
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
        return new self(array_map([KppWithDate::class, 'toDto'], $data));
    }
}