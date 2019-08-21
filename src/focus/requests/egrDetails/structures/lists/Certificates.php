<?php

namespace unapi\kontur\focus\objects\lists;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Certificate;

class Certificates implements \IteratorAggregate, DtoInterface
{
    /** @var Certificate[] */
    private $list;

    /**
     * Certificates constructor.
     * @param Certificate[] $list
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
        return new self(array_map([Certificate::class, 'toDto'], $data));
    }
}