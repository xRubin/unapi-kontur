<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;

class SuccessorsArray implements \IteratorAggregate, DtoInterface
{
    /** @var Successor[] */
    private $list;

    /**
     * SuccessorsArray constructor.
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