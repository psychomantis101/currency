<?php

namespace App\Services;

use App\Enums\Currency;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final class ExternalApiConverterService implements ConverterInterface
{
    public function convert($currency, $amount): array
    {
        $currencies = array_filter(Currency::getCurrencies(), fn($c) => $c != $currency);

        $rates = [$currency => $amount];

        foreach ($currencies as $toCurrency) {
            $response = $this->fetchData($currency, $toCurrency, $amount);

            $result = json_decode($response->body());

            $rates[$toCurrency] = round(get_object_vars($result)['result'], 2);
        }

        return $rates;
    }

    private function fetchData($from, $to, $amount): PromiseInterface|Response
    {
        $convertFrom =  '&from=' . $from;

        $amount = '&amount=' . $amount;

        $convertTo = 'convert?to=' . $to;

        return Http::withHeaders(['apikey' => config('services.currency.key')])
            ->get(config('services.currency.url') . $convertTo . $convertFrom . $amount);
    }
}
