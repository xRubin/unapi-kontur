<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class NalogRegBody implements DtoInterface
{
    /** @var string|null */
    private $nalogCode;
    /** @var string|null */
    private $nalogName;
    /** @var \DateTimeImmutable|null */
    private $nalogRegDate;
    /** @var string|null */
    private $kpp;
    /** @var \DateTimeImmutable|null */
	private $date;

    /**
     * @return null|string
     */
    public function getNalogCode(): ?string
    {
        return $this->nalogCode;
    }

    /**
     * @param null|string $nalogCode
     * @return NalogRegBody
     */
    public function setNalogCode(?string $nalogCode): NalogRegBody
    {
        $this->nalogCode = $nalogCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNalogName(): ?string
    {
        return $this->nalogName;
    }

    /**
     * @param null|string $nalogName
     * @return NalogRegBody
     */
    public function setNalogName(?string $nalogName): NalogRegBody
    {
        $this->nalogName = $nalogName;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getNalogRegDate(): ?\DateTimeImmutable
    {
        return $this->nalogRegDate;
    }

    /**
     * @param \DateTimeImmutable|null $nalogRegDate
     * @return NalogRegBody
     */
    public function setNalogRegDate(?\DateTimeImmutable $nalogRegDate): NalogRegBody
    {
        $this->nalogRegDate = $nalogRegDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getKpp(): ?string
    {
        return $this->kpp;
    }

    /**
     * @param null|string $kpp
     * @return NalogRegBody
     */
    public function setKpp(?string $kpp): NalogRegBody
    {
        $this->kpp = $kpp;
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
     * @return NalogRegBody
     */
    public function setDate(?\DateTimeImmutable $date): NalogRegBody
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('nalogCode', $data))
            $result->setNalogCode((string)$data['nalogCode']);

        if (array_key_exists('nalogName', $data))
            $result->setNalogName((string)$data['nalogName']);

        if (array_key_exists('nalogRegDate', $data))
            $result->setNalogRegDate(Date::convert($data['nalogRegDate']));

        if (array_key_exists('kpp', $data))
            $result->setKpp((string)$data['kpp']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}
