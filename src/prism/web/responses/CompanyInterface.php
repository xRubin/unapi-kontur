<?php

namespace unapi\kontur\prism\web\responses;

use unapi\interfaces\DtoInterface;

interface CompanyInterface extends DtoInterface
{
    /**
     * @return string
     */
    public function getBasicName(): string;

    /**
     * @param string $basicName
     * @return CompanyInterface
     */
    public function setBasicName(string $basicName): CompanyInterface;

    /**
     * @return string
     */
    public function getInn(): string;

    /**
     * @param string $inn
     * @return CompanyInterface
     */
    public function setInn(string $inn): CompanyInterface;

    /**
     * @return string
     */
    public function getOgrn(): string;

    /**
     * @param string $ogrn
     * @return CompanyInterface
     */
    public function setOgrn(string $ogrn): CompanyInterface;

    /**
     * @return string
     */
    public function getOkato(): string;

    /**
     * @param string $okato
     * @return CompanyInterface
     */
    public function setOkato(string $okato): CompanyInterface;

    /**
     * @return string
     */
    public function getOkpo(): string;

    /**
     * @param string $okpo
     * @return CompanyInterface
     */
    public function setOkpo(string $okpo): CompanyInterface;

    /**
     * @return string
     */
    public function getOktmo(): string;

    /**
     * @param string $oktmo
     * @return CompanyInterface
     */
    public function setOktmo(string $oktmo): CompanyInterface;
}
