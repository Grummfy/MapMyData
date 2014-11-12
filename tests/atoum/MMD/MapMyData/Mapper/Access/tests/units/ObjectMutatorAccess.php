<?php

namespace MMD\MapMyData\Mapper\Access\tests\units;

use MMD\MapMyData\Mapper\Access\ObjectMutatorAccess as TestedClass;

class ObjectMutatorAccess extends \atoum\test
{
	public function testSetValue()
	{
		$data = new MyContainer();

		$toTest = new TestedClass();

		$resultFinal = $toTest->setValue($data, 'test', 'OK');

		$this->assert()
		     ->object($resultFinal)
		     ->isEqualTo($data);

		$this->assert()
		     ->variable($data->getTest())
		     ->isEqualTo('OK');
	}

	public function testGetValue()
	{
		$data = new MyContainer();
		$data->setTest('OK');

		$toTest = new TestedClass();
		$this->assert()
		     ->string($toTest->getValue($data, 'test'))
		     ->isEqualTo('OK');
	}
}

class MyContainer
{
	public function getTest()
	{
		return $this->_test;
	}

	public function setTest($value)
	{
		$this->_test = $value;

		return $this;
	}
}
