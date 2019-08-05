<?php
/**
 * Created by PhpStorm.
 * User: 1запуск BeCompact
 * Date: 05.08.2019
 * Time: 18:10
 */

namespace unapi\kontur\focus;

interface CredentialsInterface
{
    /**
     * @return string
     */
    public function getKey(): string;
}