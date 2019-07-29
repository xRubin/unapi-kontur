<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

class TokenByPasswordResponse implements TokenByPasswordResponseInterface
{
    /** @var mixed */
    private $TrustedCertificates;
    /** @var string */
    private $Status;
    /** @var array */
    private $Messages;
    /** @var string */
    private $Token;
    /** @var string */
    private $Sid;
    /** @var mixed */
    private $Thumbprint;
    /** @var bool */
    private $IsV5;

    /**
     * TokenByPasswordResponse constructor.
     * @param mixed $TrustedCertificates
     * @param string $Status
     * @param array $Messages
     * @param string $Token
     * @param string $Sid
     * @param mixed $Thumbprint
     * @param bool $IsV5
     */
    public function __construct($TrustedCertificates, string $Status, array $Messages, string $Token, string $Sid, $Thumbprint, bool $IsV5)
    {
        $this->TrustedCertificates = $TrustedCertificates;
        $this->Status = $Status;
        $this->Messages = $Messages;
        $this->Token = $Token;
        $this->Sid = $Sid;
        $this->Thumbprint = $Thumbprint;
        $this->IsV5 = $IsV5;
    }

    /**
     * @return mixed
     */
    public function getTrustedCertificates()
    {
        return $this->TrustedCertificates;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->Messages;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->Token;
    }

    /**
     * @return string
     */
    public function getSid(): string
    {
        return $this->Sid;
    }

    /**
     * @return mixed
     */
    public function getThumbprint()
    {
        return $this->Thumbprint;
    }

    /**
     * @return bool
     */
    public function isV5(): bool
    {
        return $this->isV5;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            $data['TrustedCertificates'],
            $data['Status'],
            $data['Messages'],
            $data['Token'],
            $data['Sid'],
            $data['Thumbprint'],
            $data['IsV5']
        );
    }
}