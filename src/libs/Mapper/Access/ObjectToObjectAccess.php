<?php

namespace MMD\MapMyData\Mapper\Access;

class ObjectToObjectAccess extends AbstractAccess
{
	public function getValue($dataSource, $fieldSource)
	{
		return $dataSource->$fieldSource;
	}

	public function setValue($result, $field, $value)
	{
		$result->$field = $value;
		return $result;
	}
}