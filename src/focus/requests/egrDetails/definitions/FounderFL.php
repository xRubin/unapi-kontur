<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;

class FounderFL implements DtoInterface
{
    /** @var string|null */
    private $fio;
    /** @var string|null */
    private $innfl;
    /** @var Share|null */
    private $share;
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var \DateTimeImmutable|null */
    private $firstDate;

    /**
     * @return null|string
     */
    public function getFio(): ?string
    {
        return $this->fio;
    }

    /**
     * @param null|string $fio
     * @return FounderFL
     */
    public function setFio(?string $fio): FounderFL
    {
        $this->fio = $fio;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getInnfl(): ?string
    {
        return $this->innfl;
    }

    /**
     * @param null|string $innfl
     * @return FounderFL
     */
    public function setInnfl(?string $innfl): FounderFL
    {
        $this->innfl = $innfl;
        return $this;
    }

    /**
     * @return null|Share
     */
    public function getShare(): ?Share
    {
        return $this->share;
    }

    /**
     * @param null|Share $share
     * @return FounderFL
     */
    public function setShare(?Share $share): FounderFL
    {
        $this->share = $share;
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
     * @return FounderFL
     */
    public function setDate(?\DateTimeImmutable $date): FounderFL
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFirstDate(): ?\DateTimeImmutable
    {
        return $this->firstDate;
    }

    /**
     * @param \DateTimeImmutable|null $firstDate
     * @return FounderFL
     */
    public function setFirstDate(?\DateTimeImmutable $firstDate): FounderFL
    {
        $this->firstDate = $firstDate;
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
            $result->setFio((string)$data['fio']);

        if (array_key_exists('innfl', $data))
            $result->setInnfl((string)$data['innfl']);

        if (array_key_exists('share', $data))
            $result->setShare(Share::toDto($data['share']));

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        if (array_key_exists('firstDate', $data))
            $result->setFirstDate(Date::convert($data['firstDate']));

        return $result;
    }
}
