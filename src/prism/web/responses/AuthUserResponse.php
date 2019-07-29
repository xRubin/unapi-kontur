<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

class AuthUserResponse implements AuthUserResponseInterface
{
    /** @var string */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $login;
    /** @var string */
    private $clientId;
    /** @var bool */
    private $isSuperAdmin;
    /** @var bool */
    private $hasRoles;
    /** @var bool */
    private $isOrgAdmin;
    /** @var bool */
    private $isSeller;

    /**
     * AuthUserResponse constructor.
     * @param string $id
     * @param string $name
     * @param string $login
     * @param string $clientId
     * @param bool $isSuperAdmin
     * @param bool $hasRoles
     * @param bool $isOrgAdmin
     * @param bool $isSeller
     */
    public function __construct(string $id, string $name, string $login, string $clientId, bool $isSuperAdmin, bool $hasRoles, bool $isOrgAdmin, bool $isSeller)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->clientId = $clientId;
        $this->isSuperAdmin = $isSuperAdmin;
        $this->hasRoles = $hasRoles;
        $this->isOrgAdmin = $isOrgAdmin;
        $this->isSeller = $isSeller;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->isSuperAdmin;
    }

    /**
     * @return bool
     */
    public function hasRoles(): bool
    {
        return $this->hasRoles;
    }

    /**
     * @return bool
     */
    public function isOrgAdmin(): bool
    {
        return $this->isOrgAdmin;
    }

    /**
     * @return bool
     */
    public function isSeller(): bool
    {
        return $this->isSeller;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['login'],
            $data['clientId'],
            $data['isSuperAdmin'],
            $data['hasRoles'],
            $data['isOrgAdmin'],
            $data['isSeller']
        );
    }
}