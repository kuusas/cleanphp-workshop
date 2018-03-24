<?php

namespace Model\Weather\Converter\Speed;

class MphToKmh
{
    public function convert(int $value) : int
    {
        return round($value * 1.6093440, 0);
    }
}
