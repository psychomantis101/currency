<?php

namespace App\Services;

interface ConverterInterface
{
    public function convert($currency, $amount);
}
