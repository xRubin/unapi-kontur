<?php

namespace unapi\kontur\prism\responses;

use unapi\interfaces\DtoInterface;

class ApiKeysResponse implements ApiKeysResponseInterface
{
    /** @var string */
    private $value;
    /** @var bool */
    private $isActive;
    /** @var string */
    private $type;
    /** @var string */
    private $comment;
    /** @var ApiKeyLimit[] */
    private $limits = [];

    /**
     * ApiKeysResponse constructor.
     * @param string $value
     * @param bool $isActive
     * @param string $type
     * @param string $comment
     * @param ApiKeyLimit[] $limits
     */
    public function __construct(string $value, bool $isActive, string $type, string $comment, array $limits)
    {
        $this->value = $value;
        $this->isActive = $isActive;
        $this->type = $type;
        $this->comment = $comment;
        $this->limits = $limits;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return ApiKeyLimit[]
     */
    public function getLimits(): array
    {
        return $this->limits;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            $data['value'],
            $data['isActive'],
            $data['type'],
            $data['comment'],
            array_map(
                [ApiKeyLimit::class, 'toDto'],
                $data['limits']
            )
        );
    }
}