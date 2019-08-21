<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\structures;

class EgrRecord implements DtoInterface
{
    /** @var string|null */
    private $grn;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var string|null */
    private $name;
    /** @var bool|null */
    private $isInvalid;
    /** @var \DateTimeImmutable|null */
    private $invalidSince;
    /** @var string|null */
    private $regName;
    /** @var string|null */
    private $regCode;
    /** @var structures\DocumentsArray */
    private $documents;
    /** @var structures\CertificatesArray */
    private $certificates;

    /**
     * @return null|string
     */
    public function getGrn(): ?string
    {
        return $this->grn;
    }

    /**
     * @param null|string $grn
     * @return EgrRecord
     */
    public function setGrn(?string $grn): EgrRecord
    {
        $this->grn = $grn;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable|null $date
     * @return EgrRecord
     */
    public function setDate(?\DateTimeImmutable $date): EgrRecord
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return EgrRecord
     */
    public function setName(?string $name): EgrRecord
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisInvalid(): ?bool
    {
        return $this->isInvalid;
    }

    /**
     * @param bool|null $isInvalid
     * @return EgrRecord
     */
    public function setIsInvalid(?bool $isInvalid): EgrRecord
    {
        $this->isInvalid = $isInvalid;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getInvalidSince(): ?\DateTimeImmutable
    {
        return $this->invalidSince;
    }

    /**
     * @param \DateTimeImmutable|null $invalidSince
     * @return EgrRecord
     */
    public function setInvalidSince(?\DateTimeImmutable $invalidSince): EgrRecord
    {
        $this->invalidSince = $invalidSince;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRegName(): ?string
    {
        return $this->regName;
    }

    /**
     * @param null|string $regName
     * @return EgrRecord
     */
    public function setRegName(?string $regName): EgrRecord
    {
        $this->regName = $regName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRegCode(): ?string
    {
        return $this->regCode;
    }

    /**
     * @param null|string $regCode
     * @return EgrRecord
     */
    public function setRegCode(?string $regCode): EgrRecord
    {
        $this->regCode = $regCode;
        return $this;
    }

    /**
     * @return structures\DocumentsArray
     */
    public function getDocuments(): structures\DocumentsArray
    {
        return $this->documents;
    }

    /**
     * @param structures\DocumentsArray $documents
     * @return EgrRecord
     */
    public function setDocuments(structures\DocumentsArray $documents): EgrRecord
    {
        $this->documents = $documents;
        return $this;
    }

    /**
     * @return structures\CertificatesArray
     */
    public function getCertificates(): structures\CertificatesArray
    {
        return $this->certificates;
    }

    /**
     * @param structures\CertificatesArray $certificates
     * @return EgrRecord
     */
    public function setCertificates(structures\CertificatesArray $certificates): EgrRecord
    {
        $this->certificates = $certificates;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('grn', $data))
            $result->setGrn($data['grn']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        if (array_key_exists('name', $data))
            $result->setName($data['name']);

        if (array_key_exists('isInvalid', $data))
            $result->setIsInvalid($data['isInvalid']);

        if (array_key_exists('invalidSince', $data))
            $result->setInvalidSince(Date::convert($data['invalidSince']));

        if (array_key_exists('regName', $data))
            $result->setRegName($data['regName']);

        if (array_key_exists('regCode', $data))
            $result->setRegCode($data['regCode']);

        $result->setDocuments(
            structures\DocumentsArray::toDto(array_key_exists('documents', $data) ? $data['documents'] : [])
        );

        $result->setCertificates(
            structures\CertificatesArray::toDto(array_key_exists('certificates', $data) ? $data['certificates'] : [])
        );

        return $result;
    }
}