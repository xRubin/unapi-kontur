<?php

namespace unapi\kontur\focus\objects;

use unapi\interfaces\DtoInterface;

class RequisitesIP implements DtoInterface
{
    /** @var string|null */
    private $fio;
    /** @var string|null */
    private $okpo;
    /** @var string|null */
    private $okato;
    /** @var string|null */
    private $okfs;
    /** @var string|null */
    private $okogu;
    /** @var string|null */
    private $okopf;
    /** @var string|null */
    private $opf;
    /** @var string|null */
    private $oktmo;
    /** @var \DateTimeImmutable|null */
    private $registrationDate;
    /** @var \DateTimeImmutable|null */
    private $dissolutionDate;
    /** @var StatusIP|null */
    private $status;

    /**
     * @return null|string
     */
    public function getFio(): ?string
    {
        return $this->fio;
    }

    /**
     * @param null|string $fio
     * @return RequisitesIP
     */
    public function setFio(?string $fio): RequisitesIP
    {
        $this->fio = $fio;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkpo(): ?string
    {
        return $this->okpo;
    }

    /**
     * @param null|string $okpo
     * @return RequisitesIP
     */
    public function setOkpo(?string $okpo): RequisitesIP
    {
        $this->okpo = $okpo;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkato(): ?string
    {
        return $this->okato;
    }

    /**
     * @param null|string $okato
     * @return RequisitesIP
     */
    public function setOkato(?string $okato): RequisitesIP
    {
        $this->okato = $okato;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkfs(): ?string
    {
        return $this->okfs;
    }

    /**
     * @param null|string $okfs
     * @return RequisitesIP
     */
    public function setOkfs(?string $okfs): RequisitesIP
    {
        $this->okfs = $okfs;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkogu(): ?string
    {
        return $this->okogu;
    }

    /**
     * @param null|string $okogu
     * @return RequisitesIP
     */
    public function setOkogu(?string $okogu): RequisitesIP
    {
        $this->okogu = $okogu;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkopf(): ?string
    {
        return $this->okopf;
    }

    /**
     * @param null|string $okopf
     * @return RequisitesIP
     */
    public function setOkopf(?string $okopf): RequisitesIP
    {
        $this->okopf = $okopf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOpf(): ?string
    {
        return $this->opf;
    }

    /**
     * @param null|string $opf
     * @return RequisitesIP
     */
    public function setOpf(?string $opf): RequisitesIP
    {
        $this->opf = $opf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    /**
     * @param null|string $oktmo
     * @return RequisitesIP
     */
    public function setOktmo(?string $oktmo): RequisitesIP
    {
        $this->oktmo = $oktmo;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getRegistrationDate(): ?\DateTimeImmutable
    {
        return $this->registrationDate;
    }

    /**
     * @param \DateTimeImmutable|null $registrationDate
     * @return RequisitesIP
     */
    public function setRegistrationDate(?\DateTimeImmutable $registrationDate): RequisitesIP
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDissolutionDate(): ?\DateTimeImmutable
    {
        return $this->dissolutionDate;
    }

    /**
     * @param \DateTimeImmutable|null $dissolutionDate
     * @return RequisitesIP
     */
    public function setDissolutionDate(?\DateTimeImmutable $dissolutionDate): RequisitesIP
    {
        $this->dissolutionDate = $dissolutionDate;
        return $this;
    }

    /**
     * @return null|StatusIP
     */
    public function getStatus(): ?StatusIP
    {
        return $this->status;
    }

    /**
     * @param null|StatusIP $status
     * @return RequisitesIP
     */
    public function setStatus(?StatusIP $status): RequisitesIP
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
            $result->setRegistrationDate(Date::convert($data['registrationDate']));

        if (array_key_exists('dissolutionDate', $data))
            $result->setDissolutionDate(Date::convert($data['dissolutionDate']));

        if (array_key_exists('status', $data))
            $result->setStatus(StatusIP::toDto($data['status']));


        return $result;
    }
}