<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;

class Requisites implements DtoInterface
{
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var string */
    private $focusHref;
    /** @var UL|null */
    private $UL;
    /** @var IP|null */
    private $IP;

    /**
     * Requisites constructor.
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
     * @return null|UL
     */
    public function getUL(): ?UL
    {
        return $this->UL;
    }

    /**
     * @param null|UL $UL
     * @return Requisites
     */
    public function setUL(?UL $UL): Requisites
    {
        $this->UL = $UL;
        return $this;
    }

    /**
     * @return null|IP
     */
    public function getIP(): ?IP
    {
        return $this->IP;
    }

    /**
     * @param null|IP $IP
     * @return Requisites
     */
    public function setIP(?IP $IP): Requisites
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
            $result->setUL(UL::toDto($data['UL']));

        if (array_key_exists('IP', $data))
            $result->setIP(IP::toDto($data['IP']));

        return $result;
    }
}