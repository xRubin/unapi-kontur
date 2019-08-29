<?php

namespace unapi\kontur\focus\requests\common\definitions;

use DateTimeImmutable;

class Date
{
    private const FORMAT = 'Y-m-d';

    public static function convert(?string $value): ?\DateTimeImmutable
    {
        if (null === $value)
            return null;

        $result = DateTimeImmutable::createFromFormat(self::FORMAT, $value);

        $errors = DateTimeImmutable::getLastErrors();
        if ($result === false || $errors['error_count'] || $errors['warning_count']) {
            return null;
        } else {
            return $result;
        }
    }
}