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

	/**
	 * Is the data setted
	 * @param mixed $dataSource
	 * @param string $fieldSource
	 *
	 * @return mixed
	 */
	public function issetValue($dataSource, $fieldSource);
}
