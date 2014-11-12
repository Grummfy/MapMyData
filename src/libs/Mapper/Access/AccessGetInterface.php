<?php

namespace MMD\MapMyData\Mapper\Access;

interface AccessGetInterface
{
	/**
	 * @param mixed $dataSource
	 * @param string $fieldSource
	 *
	 * @return mixed
	 */
	public function getValue($dataSource, $fieldSource);
}
