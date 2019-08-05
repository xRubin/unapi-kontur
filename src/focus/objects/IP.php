<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\definitions\LegalAddress;
use unapi\kontur\focus\definitions\LegalName;

class IP implements DtoInterface
{
    /** @var string */
    private $fio;
    /** @var string */
    private $okpo;
    /** @var string */
    private $okato;
    /** @var string */
    private $okfs;
    /** @var string */
    private $okogu;
    /** @var string */
    private $okopf;
    /** @var string */
    private $opf;
    /** @var string */
    private $oktmo;
    /** @var \DateTimeInterface */
    private $registrationDate;
    /** @var \DateTimeInterface */
    private $dissolutionDate;
    /** @var StatusIP */
    private $status;

    /**
     * @return string
     */
    public function getFio(): string
    {
        return $this->fio;
    }

    /**
     * @param string $fio
     * @return IP
     */
    public function setFio(string $fio): IP
    {
        $this->fio = $fio;
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
     * @return IP
     */
    public function setOkpo(string $okpo): IP
    {
        $this->okpo = $okpo;
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
     * @return IP
     */
    public function setOkato(string $okato): IP
    {
        $this->okato = $okato;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkfs(): string
    {
        return $this->okfs;
    }

    /**
     * @param string $okfs
     * @return IP
     */
    public function setOkfs(string $okfs): IP
    {
        $this->okfs = $okfs;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkogu(): string
    {
        return $this->okogu;
    }

    /**
     * @param string $okogu
     * @return IP
     */
    public function setOkogu(string $okogu): IP
    {
        $this->okogu = $okogu;
        return $this;
    }

    /**
     * @return string
     */
    public function getOkopf(): string
    {
        return $this->okopf;
    }

    /**
     * @param string $okopf
     * @return IP
     */
    public function setOkopf(string $okopf): IP
    {
        $this->okopf = $okopf;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpf(): string
    {
        return $this->opf;
    }

    /**
     * @param string $opf
     * @return IP
     */
    public function setOpf(string $opf): IP
    {
        $this->opf = $opf;
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
     * @return IP
     */
    public function setOktmo(string $oktmo): IP
    {
        $this->oktmo = $oktmo;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getRegistrationDate(): \DateTimeInterface
    {
        return $this->registrationDate;
    }

    /**
     * @param \DateTimeInterface $registrationDate
     * @return IP
     */
    public function setRegistrationDate(\DateTimeInterface $registrationDate): IP
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDissolutionDate(): \DateTimeInterface
    {
        return $this->dissolutionDate;
    }

    /**
     * @param \DateTimeInterface $dissolutionDate
     * @return IP
     */
    public function setDissolutionDate(\DateTimeInterface $dissolutionDate): IP
    {
        $this->dissolutionDate = $dissolutionDate;
        return $this;
    }

    /**
     * @return StatusIP
     */
    public function getStatus(): StatusIP
    {
        return $this->status;
    }

    /**
     * @param StatusIP $status
     * @return IP
     */
    public function setStatus(StatusIP $status): IP
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('fio', $data))
            $result->setFio($data['kpp']);

        if (array_key_exists('okpo', $data))
            $result->setOkpo($data['okpo']);

        if (array_key_exists('okato', $data))
            $result->setOkato($data['okato']);

        if (array_key_exists('okfs', $data))
            $result->setOkfs($data['okfs']);

        if (array_key_exists('oktmo', $data))
            $result->setOktmo($data['oktmo']);

        if (array_key_exists('okogu', $data))
            $result->setOkogu($data['okogu']);

        if (array_key_exists('okopf', $data))
            $result->setOkopf($data['okopf']);

        if (array_key_exists('opf', $data))
            $result->setOpf($data['opf']);

        if (array_key_exists('registrationDate', $data))
            $result->setRegistrationDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['registrationDate']));

        if (array_key_exists('dissolutionDate', $data))
            $result->setDissolutionDate(\DateTimeImmutable::createFromFormat('Y-m-d', $data['dissolutionDate']));

        if (array_key_exists('status', $data))
            $result->setStatus(StatusIP::toDto($data['status']));


        return $result;
    }
}