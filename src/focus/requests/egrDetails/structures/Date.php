<?php

namespace unapi\kontur\focus\objects;

use DateTimeImmutable;

class Date
{
    private const FORMAT = 'Y-m-d';

    public static function convert(string $value): ?\DateTimeImmutable
    {
        $result = DateTimeImmutable::createFromFormat(self::FORMAT, $value);

        $errors = DateTimeImmutable::getLastErrors();
        if ($result === false || $errors['error_count'] || $errors['warning_count']) {
            return null;
        } else {
            return $result;
        }
    }
}