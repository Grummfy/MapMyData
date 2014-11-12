<?php

namespace MMD\MapMyData\Mapper\Access\tests\units;

use MMD\MapMyData\Mapper\Access\ArrayAccess as TestedClass;

class ArrayAccess extends \atoum\test
{
	public function testSetValue()
	{
		$data = ['test' => 'OK'];
		$result = [];

		$toTest = new TestedClass();
		$resultFinal = $toTest->setValue($result, 'test', 'OK');
		$this->assert()
		     ->array($resultFinal)
		     ->isNotEqualTo($result)
		     ->isEqualTo($data);
	}

	public function testGetValue()
	{
		$data = ['test' => 'OK'];

		$toTest = new TestedClass();
		$this->assert()
		     ->string($toTest->getValue($data, 'test'))
		     ->isEqualTo($data['test']);
	}
}
