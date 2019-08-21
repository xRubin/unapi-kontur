<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Date;

class Document implements DtoInterface
{
    /** @var string|null */
    private $name;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Document
     */
    public function setName(?string $name): Document
    {
        $this->name = $name;
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
     * @return Document
     */
    public function setDate(?\DateTimeImmutable $date): Document
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

        if (array_key_exists('name', $data))
            $result->setName((string)$data['name']);

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        return $result;
    }
}