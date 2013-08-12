<?php

namespace Respect\Validation\Rules;
//Evandro
class Blank extends AbstractRule
{
    public function validate($input)
    {
        if(is_array($input))
            return empty($input);
        if($input===null || $input === "")
            return true;
        return false;
    }

}
