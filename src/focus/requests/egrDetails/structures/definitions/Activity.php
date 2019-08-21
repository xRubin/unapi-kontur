<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;

class Activity implements DtoInterface
{
    /** @var string */
    private $code;
    /** @var string */
    private $text;
    /** @var \DateTimeImmutable|null */
    private $date;

    /**
     * Activity constructor.
     * @param string $code
     * @param string $text
     * @param \DateTimeImmutable|null $date
     */
    public function __construct(string $code, string $text, ?\DateTimeImmutable $date)
    {
        $this->code = $code;
        $this->text = $text;
        $this->date = $date;
    }


    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
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
            (string)$data['code'],
            (string)$data['text'],
            Date::convert($data['date'])
        );
    }
}
