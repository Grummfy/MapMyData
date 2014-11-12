<?php

namespace MMD\MapMyData\Mapper\Access;

interface AccessInterface
{
	/**
	 * @param mixed $dataSource
	 * @param mixed $dataResult
	 * @param string $fieldSource
	 * @param string $fieldDestination
	 *
	 * @return mixed
	 */
	public function mapToDestination($dataSource, $dataResult, $fieldSource, $fieldDestination);
}
