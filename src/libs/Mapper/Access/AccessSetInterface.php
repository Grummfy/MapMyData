<?php

namespace MMD\MapMyData\Mapper\Access;

interface AccessSetInterface
{
	/**
	 * @param mixed $result
	 * @param string $field
	 * @param mixed $value
	 *
	 * @return mixed
	 */
	public function setValue($result, $field, $value);
}
