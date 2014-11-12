<?php

namespace MMD\MapMyData\Mapper\Access\tests\units;

use MMD\MapMyData\Mapper\Access\ComposedAccess as TestedClass;

class ComposedAccess extends \atoum\test
{
	public function testMapToDestination()
	{
		$setter = new \mock\MMD\MapMyData\Mapper\Access\AccessSetInterface();
		$getter = new \mock\MMD\MapMyData\Mapper\Access\AccessGetInterface();

		$getter->getMockController()->getValue = function($dataSource, $fieldSource)
		{
			return 'OK';
		};

		$setter->getMockController()->setValue = function($dataResult, $fieldDestination, $data)
		{
			return; // $this;
		};

		$testClass = new TestedClass($getter, $setter);

		$dataSource = [];
		$dataResult = [];
		$fieldSource = 'test';
		$fieldDestination = 'test';

		$testClass->mapToDestination($dataSource, $dataResult, $fieldSource, $fieldDestination);
		$this->object($testClass)
		     ->mock($getter)
		     ->call('getValue')
		     ->once();

		$this->object($testClass)
		     ->mock($setter)
		     ->call('setValue')
		     ->once();

	}

//	public function mapToDestination($dataSource, $dataResult, $fieldSource, $fieldDestination)
//	{
//		$data = $this->_getter->getValue($dataSource, $fieldSource);
//
//		$dataResult = $this->_setter->getValue($dataResult, $fieldDestination, $data);
//
//		return $dataResult;
//	}
}
