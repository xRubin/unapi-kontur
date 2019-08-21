<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;

class Toponym implements DtoInterface
{
    /** @var string|null */
    private $topoShortName;
    /** @var string|null */
    private $topoFullName;
    /** @var string */
    private $topoValue;

    /**
     * Toponym constructor.
     * @param string $topoValue
     */
    public function __construct(string $topoValue)
    {
        $this->topoValue = $topoValue;
    }

    /**
     * @return null|string
     */
    public function getTopoShortName(): ?string
    {
        return $this->topoShortName;
    }

    /**
     * @param null|string $topoShortName
     * @return Toponym
     */
    public function setTopoShortName(?string $topoShortName): Toponym
    {
        $this->topoShortName = $topoShortName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTopoFullName(): ?string
    {
        return $this->topoFullName;
    }

    /**
     * @param null|string $topoFullName
     * @return Toponym
     */
    public function setTopoFullName(?string $topoFullName): Toponym
    {
        $this->topoFullName = $topoFullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTopoValue(): string
    {
        return $this->topoValue;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self(
            (string)$data['topoValue']
        );

        if (array_key_exists('topoShortName', $data))
            $result->setTopoShortName($data['topoShortName']);

        if (array_key_exists('topoFullName', $data))
            $result->setTopoFullName($data['topoFullName']);

        return $result;
    }

}
