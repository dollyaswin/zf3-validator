<?php
namespace Xtend\Validator;

use Zend\Validator\AbstractValidator;
use DateTime;

class NotPastTime extends AbstractValidator
{
    const INVALID = 'startDateInvalid';

    protected $messageTemplates = [
        self::INVALID => "Invalid Start Date given. Cannot use past day.",
    ];

    public function isValid($value)
    {
        $now = new \DateTime();  
        $requestedTime = new \DateTime($value);

        if ($requestedTime < $now){
            $this->error(self::INVALID);
            return false;
        }
        
        return true;
    }
}