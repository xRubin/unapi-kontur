<?php

namespace unapi\kontur\prism\responses;

use unapi\interfaces\DtoInterface;

class AuthResponse implements AuthResponseInterface
{
    /** @var string */
    private $Sid;
    /** @var string */
    private $RefreshToken;

    /**
     * AuthResponse constructor.
     * @param string $Sid
     * @param string $RefreshToken
     */
    public function __construct(?string $Sid, ?string $RefreshToken)
    {
        $this->Sid = $Sid;
        $this->RefreshToken = $RefreshToken;
    }

    /**
     * @return string|null
     */
    public function getSid(): ?string
    {
        return $this->Sid;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->RefreshToken;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(@$data['Sid'], @$data['RefreshToken']);
    }
}