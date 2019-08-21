<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\ShareholderUL;

class ShareholdersULArray implements \IteratorAggregate, DtoInterface
{
    /** @var ShareholderUL[] */
    private $list;

    /**
     * ShareholdersULArray constructor.
     * @param ShareholderUL[] $list
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
        return new self(array_map([ShareholderUL::class, 'toDto'], $data));
    }
}