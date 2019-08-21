<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;

class Requisites implements DtoInterface
{
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var string */
    private $focusHref;
    /** @var RequisitesUL|null */
    private $UL;
    /** @var RequisitesIP|null */
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
     * @return null|RequisitesUL
     */
    public function getUL(): ?RequisitesUL
    {
        return $this->UL;
    }

    /**
     * @param null|RequisitesUL $UL
     * @return Requisites
     */
    public function setUL(?RequisitesUL $UL): Requisites
    {
        $this->UL = $UL;
        return $this;
    }

    /**
     * @return null|RequisitesIP
     */
    public function getIP(): ?RequisitesIP
    {
        return $this->IP;
    }

    /**
     * @param null|RequisitesIP $IP
     * @return Requisites
     */
    public function setIP(?RequisitesIP $IP): Requisites
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
            $result->setUL(RequisitesUL::toDto($data['UL']));

        if (array_key_exists('IP', $data))
            $result->setIP(RequisitesIP::toDto($data['IP']));

        return $result;
    }
}