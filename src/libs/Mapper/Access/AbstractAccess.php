<?php

namespace MMD\MapMyData\Mapper\Access;

abstract class AbstractAccess implements AccessInterface
{
	public function mapToDestination($dataSource, $dataResult, $fieldSource, $fieldDestination)
	{
		$data = $this->getValue($dataSource, $fieldSource);

		$dataResult = $this->getValue($dataResult, $fieldDestination, $data);

		return $dataResult;
	}

	/**
	 * @param mixed $dataSource
	 * @param string $fieldSource
	 *
	 * @return mixed
	 */
	abstract public function getValue($dataSource, $fieldSource);

	/**
	 * @param mixed $result
	 * @param string $field
	 * @param mixed $value
	 *
	 * @return mixed
	 */
	abstract public function setValue($result, $field, $value);
}
