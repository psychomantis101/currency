<?php

namespace App\Enums;

enum Currency : string
{
    case GBP = 'gbp';
    case EUR = 'eur';
    case USD = 'usd';

    public static function getCurrencies(): array
    {
        $currencies = [];

        foreach (self::cases() as $value) {
            $currencies[$value->value] = $value->name;
        }

        return $currencies;
    }

    public static function getValues(): array
    {
        $values = [];

        foreach (self::cases() as $value) {
            $values[] = $value->value;
        }

        return $values;
    }
}
