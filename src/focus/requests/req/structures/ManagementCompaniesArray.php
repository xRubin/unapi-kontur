<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\req\definitions\ManagementCompany;

class ManagementCompaniesArray implements \IteratorAggregate, DtoInterface
{
    /** @var ManagementCompany[] */
    private $list;

    /**
     * ManagementCompanies constructor.
     * @param ManagementCompany[] $list
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
        return new self(array_map([ManagementCompany::class, 'toDto'], $data));
    }
}