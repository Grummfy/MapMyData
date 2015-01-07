<?php

namespace MMD\MapMyData\Mapper\Access;

class ObjectMutatorAccess implements AccessSetInterface, AccessGetInterface
{
	public function getValue($dataSource, $fieldSource)
	{
		$method = 'get' . ucfirst($fieldSource);
		return $dataSource->$method();
	}

	public function issetValue($dataSource, $fieldSource)
	{
		return true;
	}

	public function setValue($result, $field, $value)
	{
		$method = 'set' . ucfirst($field);

		$result->$method($value);
		return $result;
	}
}
