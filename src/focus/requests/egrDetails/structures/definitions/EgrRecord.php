<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;
use unapi\kontur\focus\objects\lists;

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
    /** @var lists\Documents */
    private $documents;
    /** @var lists\Certificates */
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
     */
    public function setGrn(?string $grn): void
    {
        $this->grn = $grn;
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
     */
    public function setDate(?\DateTimeImmutable $date): void
    {
        $this->date = $date;
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
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
     */
    public function setIsInvalid(?bool $isInvalid): void
    {
        $this->isInvalid = $isInvalid;
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
     */
    public function setInvalidSince(?\DateTimeImmutable $invalidSince): void
    {
        $this->invalidSince = $invalidSince;
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
     */
    public function setRegName(?string $regName): void
    {
        $this->regName = $regName;
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
     */
    public function setRegCode(?string $regCode): void
    {
        $this->regCode = $regCode;
    }

    /**
     * @return lists\Documents
     */
    public function getDocuments(): lists\Documents
    {
        return $this->documents;
    }

    /**
     * @param lists\Documents $documents
     * @return EgrRecord
     */
    public function setDocuments(lists\Documents $documents): EgrRecord
    {
        $this->documents = $documents;
        return $this;
    }

    /**
     * @return lists\Certificates
     */
    public function getCertificates(): lists\Certificates
    {
        return $this->certificates;
    }

    /**
     * @param lists\Certificates $certificates
     * @return EgrRecord
     */
    public function setCertificates(lists\Certificates $certificates): EgrRecord
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
            lists\Documents::toDto(array_key_exists('documents', $data) ? $data['documents'] : [])
        );

        $result->setCertificates(
            lists\Certificates::toDto(array_key_exists('certificates', $data) ? $data['certificates'] : [])
        );

        return $result;
    }
}