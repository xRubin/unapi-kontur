<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class NalogRegBody implements DtoInterface
{
    /** @var string */
    private $nalogCode;
    /** @var string */
    private $nalogName;
    /** @var \DateTimeImmutable|null */
    private $nalogRegDate;
    /** @var string */
    private $kpp;
    /** @var \DateTimeImmutable|null */
	private $date;

    /**
     * NalogRegBody constructor.
     * @param string $nalogCode
     * @param string $nalogName
     * @param \DateTimeImmutable|null $nalogRegDate
     * @param string $kpp
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $nalogCode, string $nalogName, ?\DateTimeImmutable $nalogRegDate, string $kpp, ?\DateTimeImmutable $date)
    {
        $this->nalogCode = $nalogCode;
        $this->nalogName = $nalogName;
        $this->nalogRegDate = $nalogRegDate;
        $this->kpp = $kpp;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getNalogCode(): string
    {
        return $this->nalogCode;
    }

    /**
     * @return string
     */
    public function getNalogName(): string
    {
        return $this->nalogName;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getNalogRegDate(): ?\DateTimeImmutable
    {
        return $this->nalogRegDate;
    }

    /**
     * @return string
     */
    public function getKpp(): string
    {
        return $this->kpp;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            (string)$data['nalogCode'],
            (string)$data['nalogName'],
            Date::convert($data['nalogRegDate']),
            (string)$data['kpp'],
            Date::convert($data['date'])
        );
    }
}
