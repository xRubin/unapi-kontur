<?php

namespace unapi\kontur\focus\requests\egrDetails\definitions;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\structures;

class Shareholders implements DtoInterface
{
    /** @var \DateTimeImmutable|null */
    private $date;
    /** @var structures\ShareholdersFLArray */
    private $shareholdersFL;
    /** @var structures\ShareholdersULArray */
    private $shareholdersUL;
    /** @var structures\ShareholdersOtherArray */
    private $shareholdersOther;

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
     * @return structures\ShareholdersFLArray
     */
    public function getShareholdersFL(): structures\ShareholdersFLArray
    {
        return $this->shareholdersFL;
    }

    /**
     * @param structures\ShareholdersFLArray $shareholdersFL
     */
    public function setShareholdersFL(structures\ShareholdersFLArray $shareholdersFL): void
    {
        $this->shareholdersFL = $shareholdersFL;
    }

    /**
     * @return structures\ShareholdersULArray
     */
    public function getShareholdersUL(): structures\ShareholdersULArray
    {
        return $this->shareholdersUL;
    }

    /**
     * @param structures\ShareholdersULArray $shareholdersUL
     */
    public function setShareholdersUL(structures\ShareholdersULArray $shareholdersUL): void
    {
        $this->shareholdersUL = $shareholdersUL;
    }

    /**
     * @return structures\ShareholdersOtherArray
     */
    public function getShareholdersOther(): structures\ShareholdersOtherArray
    {
        return $this->shareholdersOther;
    }

    /**
     * @param structures\ShareholdersOtherArray $shareholdersOther
     */
    public function setShareholdersOther(structures\ShareholdersOtherArray $shareholdersOther): void
    {
        $this->shareholdersOther = $shareholdersOther;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('date', $data))
            $result->setDate(Date::convert($data['date']));

        $result->setShareholdersFL(structures\ShareholdersFLArray::toDto(array_key_exists('shareholdersFL', $data) ? $data['shareholdersFL'] : []));
        $result->setShareholdersUL(structures\ShareholdersULArray::toDto(array_key_exists('shareholdersUL', $data) ? $data['shareholdersUL'] : []));
        $result->setShareholdersOther(structures\ShareholdersOtherArray::toDto(array_key_exists('shareholdersOther', $data) ? $data['shareholdersOther'] : []));

        return $result;
    }
}
