<?php

namespace MMD\MapMyData\Mapper\Access;

class ComposedAccess implements AccessInterface
{
	/**
	 * @var AccessGetInterface
	 */
	protected $_getter;

	/**
	 * @var AccessSetInterface
	 */
	protected $_setter;

	public function __construct(AccessGetInterface $getter, AccessSetInterface $setter)
	{
		$this->_getter = $getter;
		$this->_setter = $setter;
	}

	public function mapToDestination($dataSource, $dataResult, $fieldSource, $fieldDestination)
	{
		$data = $this->_getter->getValue($dataSource, $fieldSource);

		if (is_callable($data))
		{
			// TODO treat callable call
		}

		$dataResult = $this->_setter->setValue($dataResult, $fieldDestination, $data);

		return $dataResult;
	}
}
