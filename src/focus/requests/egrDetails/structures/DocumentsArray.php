<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;

class DocumentsArray implements \IteratorAggregate, DtoInterface
{
    /** @var Document[] */
    private $list;

    /**
     * DocumentsArray constructor.
     * @param Document[] $list
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
        return new self(array_map([Document::class, 'toDto'], $data));
    }
}