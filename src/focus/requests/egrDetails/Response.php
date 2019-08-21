<?php

namespace unapi\kontur\focus\requests\egrDetails;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\structures\EgrDetails;

class Response implements ResponseInterface
{
    /** @var EgrDetails[] */
    private $list;

    /**
     * Response constructor.
     * @param EgrDetails[] $list
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
        return new self(array_map([EgrDetails::class, 'toDto'], $data));
    }
}