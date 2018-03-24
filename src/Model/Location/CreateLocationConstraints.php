<?php
namespace Model\Location;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\ValidatorConstraintsInterface;

class CreateLocationConstraints implements ValidatorConstraintsInterface
{
    public function constraints(): Assert\Collection
    {
        return new Assert\Collection([
            'city' => new Assert\Required([
                new Assert\NotBlank(),
            ]),
            'country' => new Assert\Required([
                new Assert\NotBlank(),
                new Assert\Length(['max' => 20]),
            ]),
        ]);
    }
}
