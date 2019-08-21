<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\StatedCapital;

class StatedCapitalsArray implements \IteratorAggregate, DtoInterface
{
    /** @var StatedCapital[] */
    private $list;

    /**
     * StatedCapitalsArray constructor.
     * @param StatedCapital[] $list
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
        return new self(array_map([StatedCapital::class, 'toDto'], $data));
    }
}