<?php

namespace unapi\kontur\focus\requests\req;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\req\structures\Requisites;

class Response implements ResponseInterface
{
    /** @var Requisites[] */
    private $list;

    /**
     * Response constructor.
     * @param Requisites[] $list
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
        return new self(array_map([Requisites::class, 'toDto'], $data));
    }
}