<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\definitions\LegalAddress;

class LegalAddresses implements \IteratorAggregate, DtoInterface
{
    /** @var LegalAddress[] */
    private $list;

    /**
     * LegalAddresses constructor.
     * @param LegalAddress[] $list
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
        return new self(array_map([LegalAddress::class, 'toDto'], $data));
    }
}