<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraints\Collection;

interface ValidatorConstraintsInterface
{
    public function constraints() : Collection;
}