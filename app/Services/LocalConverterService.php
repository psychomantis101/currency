<?php

namespace App\Services;

final class LocalConverterService implements ConverterInterface
{
    protected array $rates = [
        'GBP' => 1,
        'EUR' => 1.1,
        'USD' => 1.3
    ];

    public function convert($currency, $amount): array
    {
        if ($currency !== 'GBP') {
            $amount = $amount / $this->rates[$currency];
        }

        $rates = [];

        foreach ($this->rates as $key => $rate) {
            $rates[$key] = round($amount * $this->rates[$key], 2);
        }

        return $rates;
    }
}
