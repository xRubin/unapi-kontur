<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Date;

class RegInfo implements DtoInterface
{
    /** @var \DateTimeImmutable|null */
    private $ogrnDate;
    /** @var string|null */
    private $regName;

    /**
     * @return \DateTimeImmutable|null
     */
    public function getOgrnDate(): ?\DateTimeImmutable
    {
        return $this->ogrnDate;
    }

    /**
     * @param \DateTimeImmutable|null $ogrnDate
     * @return RegInfo
     */
    public function setOgrnDate(?\DateTimeImmutable $ogrnDate): RegInfo
    {
        $this->ogrnDate = $ogrnDate;
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
     * @return RegInfo
     */
    public function setRegName(?string $regName): RegInfo
    {
        $this->regName = $regName;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('ogrnDate', $data))
            $result->setOgrnDate(Date::convert($data['ogrnDate']));

        if (array_key_exists('regName', $data))
            $result->setRegName((string)$data['regName']);

        return $result;
    }
}