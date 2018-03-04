<?php


namespace App\Domain\Core\Exceptions;

use Illuminate\Validation\Validator;


/**
 * Class ValidationException
 * @package App\Domain\Core\Exceptions
 */
class ValidationException extends Exception
{
    private $validator;
    /**
     * ValidationException constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        parent::__construct();
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->validator->errors();
    }

}