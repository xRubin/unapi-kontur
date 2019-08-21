<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;

class EgrDetails implements DtoInterface
{
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var string */
    private $focusHref;
    /** @var EgrDetailsUL|null */
    private $UL;
    /** @var EgrDetailsIP|null */
    private $IP;

    /**
     * EgrDetails constructor.
     * @param string $inn
     * @param string $ogrn
     * @param string $focusHref
     */
    public function __construct(string $inn, string $ogrn, string $focusHref)
    {
        $this->inn = $inn;
        $this->ogrn = $ogrn;
        $this->focusHref = $focusHref;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @return string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    /**
     * @return string
     */
    public function getFocusHref(): string
    {
        return $this->focusHref;
    }

    /**
     * @return null|EgrDetailsUL
     */
    public function getUL(): ?EgrDetailsUL
    {
        return $this->UL;
    }

    /**
     * @param null|EgrDetailsUl $UL
     * @return EgrDetails
     */
    public function setUL(?EgrDetailsUL $UL): EgrDetails
    {
        $this->UL = $UL;
        return $this;
    }

    /**
     * @return null|EgrDetailsIP
     */
    public function getIP(): ?EgrDetailsIP
    {
        return $this->IP;
    }

    /**
     * @param null|EgrDetailsIP $IP
     * @return EgrDetails
     */
    public function setIP(?EgrDeatilsIP $IP): EgrDetails
    {
        $this->IP = $IP;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIP(): bool
    {
        return null !== $this->IP;
    }

    /**
     * @return bool
     */
    public function isUL(): bool
    {
        return null !== $this->UL;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self(
            (string)$data['inn'],
            (string)$data['ogrn'],
            (string)$data['focusHref']
        );

        if (array_key_exists('UL', $data))
            $result->setUL(EgrDetailsUL::toDto($data['UL']));

        if (array_key_exists('IP', $data))
            $result->setIP(EgrDetailsIP::toDto($data['IP']));

        return $result;
    }
}