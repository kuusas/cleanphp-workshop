<?php
namespace App\Validator;

use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator
{
    const LEVEL_1 = 'Level1';
    const LEVEL_2 = 'Level2';

    protected $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(array $data, ValidatorConstraintsInterface $constraints)
    {
        $violations = new ConstraintViolationList();
        $groupSequence = [static::LEVEL_1, static::LEVEL_2, 'Default'];
        foreach ($groupSequence as $group) {
            $violations->addAll(
                $this->validator->validate(
                    $data,
                    $constraints->constraints(),
                    [$group]
                )
            );
            if (count($violations) !== 0) {
                throw new ValidatorViolationException($violations, $data);
            }
        }
    }
}
