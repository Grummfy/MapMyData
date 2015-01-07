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

		$getter->getMockController()->issetValue = function($dataSource, $fieldSource)
		{
			return true;
		};

		$setter->getMockController()->setValue = function($dataResult, $fieldDestination, $data)
		{
			$dataResult[ $fieldDestination ] = $data;
			return $dataResult;
		};

		$testClass = new TestedClass($getter, $setter);

		$dataSource = ['test'=>'OK'];
		$dataResult = [];
		$fieldSource = 'test';
		$fieldDestination = 'test2';

		$res = $testClass->mapToDestination($dataSource, $dataResult, $fieldSource, $fieldDestination);

		$this->array($res)
			->isNotEqualTo($dataResult)
			->isEqualTo(['test2' => 'OK']);

		$this->object($testClass)
		     ->mock($getter)
		     ->call('getValue')
		     ->once();

		$this->object($testClass)
		     ->mock($setter)
		     ->call('setValue')
		     ->once();

	}
}
