<?php

namespace Model\Weather\Converter\Temperature;

class FahrenheitToCelsius
{
    public function convert(int $value) : int
    {
        return round(($value-32)*5/9, 0);
    }
}
