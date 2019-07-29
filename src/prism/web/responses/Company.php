<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

class Company implements CompanyInterface
{
    /** @var string */
    private $basicName;
    /** @var string */
    private $inn;
    /** @var string */
    private $ogrn;
    /** @var string */
    private $okato;
    /** @var string */
    private $okpo;
    /** @var string */
    private $oktmo;

    /**
     * @return string
     */
    public function getBasicName(): string
    {
        return $this->basicName;
    }

    /**
     * @param string $basicName
     * @return CompanyInterface
     */
    public function setBasicName(string $basicName): CompanyInterface
    {
        $this->basicName = $basicName;
        return $this;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @param string $inn
     * @return CompanyInterface
     */
    public function setInn(string $inn): CompanyInterface
    {
        $this->inn = $inn;
        return $this;
    }

    /**
     * @return string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    /**
     * @param string $ogrn
     * @return CompanyInterface
     */
    public function setOgrn(string $ogrn): CompanyInterface
    {
        $this->ogrn = $ogrn;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkato(): string
    {
        return $this->okato;
    }

    /**
     * @param string $okato
     * @return CompanyInterface
     */
    public function setOkato(string $okato): CompanyInterface
    {
        $this->okato = $okato;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkpo(): string
    {
        return $this->okpo;
    }

    /**
     * @param string $okpo
     * @return CompanyInterface
     */
    public function setOkpo(string $okpo): CompanyInterface
    {
        $this->okpo = $okpo;
        return $this;
    }

    /**
     * @return string
     */
    public function getOktmo(): string
    {
        return $this->oktmo;
    }

    /**
     * @param string $oktmo
     * @return CompanyInterface
     */
    public function setOktmo(string $oktmo): CompanyInterface
    {
        $this->oktmo = $oktmo;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('basicName', $data))
            $result->setBasicName($data['basicName']);

        if (array_key_exists('inn', $data))
            $result->setBasicName($data['inn']);

        if (array_key_exists('ogrn', $data))
            $result->setBasicName($data['ogrn']);

        if (array_key_exists('okato', $data))
            $result->setBasicName($data['okato']);

        if (array_key_exists('okpo', $data))
            $result->setBasicName($data['okpo']);

        if (array_key_exists('oktmo', $data))
            $result->setBasicName($data['oktmo']);

        return $result;
    }
}
