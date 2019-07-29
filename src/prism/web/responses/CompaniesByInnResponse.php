<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

class CompaniesByInnResponse implements CompaniesByInnResponseInterface
{
    /** @var Company[] */
    private $list;

    /**
     * CompaniesByInnResponse constructor.
     * @param Company[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return Company[]
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(array_map([Company::class, 'toDto'], $data));
    }
}