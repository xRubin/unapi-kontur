<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

interface CompaniesByInnResponseInterface extends DtoInterface
{
    /**
     * @return Company[]
     */
    public function getList(): array;
}