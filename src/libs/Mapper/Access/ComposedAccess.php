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
		$data = $this->_getter->issetValue($dataSource, $fieldSource) ? $this->_getter->getValue($dataSource, $fieldSource) : null;

		// TODO improve this to let beeing exploitable in another way => without ComposedAccess ...
		if (is_array($fieldDestination))
		{
			if (isset($fieldDestination[1]) && is_callable($fieldDestination[1]))
			{
				$data = $fieldDestination[1]($dataSource, $dataResult, $fieldSource, $fieldDestination, $data);
				$fieldDestination = $fieldDestination[0];
			}
			elseif (isset($fieldDestination[0]) && is_callable($fieldDestination[0]))
			{
				$data = $fieldDestination[0]($dataSource, $dataResult, $fieldSource, $fieldDestination, $data);
				return $dataResult;
			}
		}

		$dataResult = $this->_setter->setValue($dataResult, $fieldDestination, $data);

		return $dataResult;
	}
}
