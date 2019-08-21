<?php

namespace unapi\kontur\focus\objects\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Date;
use unapi\kontur\focus\objects\lists;

class Shareholders implements DtoInterface
{
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var lists\ShareholdersFL */
    private $shareholdersFL;
    /** @var lists\ShareholdersUL */
    private $shareholdersUL;
    /** @var lists\ShareholdersOther */
    private $shareholdersOther;

    /**
     * Shareholders constructor.
     * @param \DateTimeImmutable|null $date
     * @param lists\ShareholdersFL $shareholdersFL
     * @param lists\ShareholdersUL $shareholdersUL
     * @param lists\ShareholdersOther $shareholdersOther
     */
    public function __construct(?\DateTimeImmutable $date, lists\ShareholdersFL $shareholdersFL, lists\ShareholdersUL $shareholdersUL, lists\ShareholdersOther $shareholdersOther)
    {
        $this->date = $date;
        $this->shareholdersFL = $shareholdersFL;
        $this->shareholdersUL = $shareholdersUL;
        $this->shareholdersOther = $shareholdersOther;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return lists\ShareholdersFL
     */
    public function getShareholdersFL(): lists\ShareholdersFL
    {
        return $this->shareholdersFL;
    }

    /**
     * @return lists\ShareholdersUL
     */
    public function getShareholdersUL(): lists\ShareholdersUL
    {
        return $this->shareholdersUL;
    }

    /**
     * @return lists\ShareholdersOther
     */
    public function getShareholdersOther(): lists\ShareholdersOther
    {
        return $this->shareholdersOther;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(
            Date::convert($data['date']),
            lists\ShareholdersFl::toDto($data['shareholdersFL']),
            lists\ShareholdersUL::toDto($data['shareholdersUL']),
            lists\ShareholdersOther::toDto($data['shareholdersOther'])
        );
    }
}
