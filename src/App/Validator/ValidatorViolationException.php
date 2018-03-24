<?php
namespace App\Validator;

use Exception;
use Symfony\Component\Validator\ConstraintViolationList;

class ValidatorViolationException extends Exception
{
    const VALIDATION_ERROR = 1;
    
    private $violations;
    private $data;

    public function __construct(
        ConstraintViolationList $violations,
        array $data = []
    ) {
        $this->data = $data;
        $this->violations = $violations;
 
        $message = 'Data validation failed';
        $code = 400;

        parent::__construct($message, $code);
    }

    public function getData()
    {
        return $this->data;
    }

    public function getErrors()
    {
        return $this->violationsToErrors();
    }

    public function getViolations()
    {
        return $this->violations;
    }

    private function violationsToErrors()
    {
        $return = [];
        $errors = $this->violations;

        if ($errors instanceof ConstraintViolationList) {
            $i = 0;
            while ($errors->has($i)) {
                $code = $errors[$i]->getCode();
                $return[] = [
                    'message' => $errors[$i]->getMessage(),
                    'code' => is_numeric($code) ? $code : self::VALIDATION_ERROR,
                    'path' => $errors[$i]->getPropertyPath(),
                ];
                $i++;
            }
        }

        return $return;
    }
}
