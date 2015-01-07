<?php

namespace MMD\MapMyData\Mapper\Access\tests\units;

use MMD\MapMyData\Mapper\Access\ObjectAccess as TestedClass;

class ObjectAccess extends \atoum\test
{
	public function testSetValue()
	{
		$data = new \stdClass();
		$data->test = 'OK';
		$result = new \stdClass();

		$toTest = new TestedClass();
		$resultFinal = $toTest->setValue($result, 'test', 'OK');
		$this->assert()
		     ->object($resultFinal)
		     ->isEqualTo($result)
		     ->isEqualTo($data);
	}

	public function testGetValue()
	{
		$data = new \stdClass();
		$data->test = 'OK';

		$toTest = new TestedClass();
		$this->assert()
		     ->string($toTest->getValue($data, 'test'))
		     ->isEqualTo($data->test);
	}

	public function testIssetValue()
	{
		$data = new \stdClass();
		$data->test = 'OK';

		$toTest = new TestedClass();
		$this->assert()
		     ->boolean($toTest->issetValue($data, 'test'))
		     ->isTrue();
	}
}
