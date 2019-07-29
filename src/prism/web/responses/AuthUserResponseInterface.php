<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

interface AuthUserResponseInterface extends DtoInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getLogin(): string;

    /**
     * @return string
     */
    public function getClientId(): string;

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool;

    /**
     * @return bool
     */
    public function hasRoles(): bool;

    /**
     * @return bool
     */
    public function isOrgAdmin(): bool;

    /**
     * @return bool
     */
    public function isSeller(): bool;
}