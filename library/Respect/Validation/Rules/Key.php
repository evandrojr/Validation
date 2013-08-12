<?php

namespace Respect\Validation\Rules;

use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Validatable;

class Key extends AbstractRelated
{
	public function __construct($reference, Validatable $referenceValidator=null, $mandatory=false)
	{
		if (!is_string($reference) || empty($reference))
			throw new ComponentException(
					'Invalid array key name'
			);

		foreach ($referenceValidator->getRules() as $rule) {
			if ($rule instanceof NotEmpty || $rule instanceof NotBlank) {
				$mandatory = true;
				break;
			}
		}
		parent::__construct($reference, $referenceValidator, $mandatory);
	}

	public function getReferenceValue($input)
	{
		return $input[$this->reference];
	}

	public function hasReference($input)
	{
		return is_array($input) && array_key_exists($this->reference, $input);
	}
}
