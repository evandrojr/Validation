<?php

namespace Respect\Validation\Rules;
//Evandro
class NotBlank extends AbstractRule
{
    public function validate($input)
    {
        if(is_array($input))
            return !empty($input);
        if($input===null || $input === "")
            return false;
        return true;
    }

}
