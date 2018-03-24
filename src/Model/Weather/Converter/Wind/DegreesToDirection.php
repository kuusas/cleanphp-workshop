<?php

namespace Model\Weather\Converter\Wind;

class DegreesToDirection
{
    public function convert(int $value) : string
    {
        if ($value == 0 || $value == 360) {
            return 'N';
        } elseif ($value > 0 && $value < 90) {
            return 'NE';
        } elseif ($value == 90) {
            return 'E';
        } elseif ($value > 90 && $value < 135) {
            return 'SE';
        } elseif ($value == 180) {
            return 'S';
        } elseif ($value > 180 && $value < 225) {
            return 'SW';
        } elseif ($value == 270) {
            return 'W';
        } elseif ($value > 270 && $value < 315) {
            return 'NW';
        } elseif ($value > 315) {
            return 'N';
        }
    }
}
