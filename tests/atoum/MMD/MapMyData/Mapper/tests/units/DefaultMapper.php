<?php

namespace MMD\MapMyData\Mapper\tests\units;

use MMD\MapMyData\Mapper\Access\ArrayAccess;
use MMD\MapMyData\Mapper\Access\ComposedAccess;
use MMD\MapMyData\Mapper\DefaultMapper as TestedClass;

class DefaultMapper extends \atoum\test
{
	public function testMapToArray()
	{
		$access = new ArrayAccess();
		$composedAccess = new ComposedAccess($access, $access);

		$testedClass = new TestedClass();
		$testedClass->addAccess('A', $composedAccess);
		$testedClass->addAccess('B', $composedAccess);

		$definition = new \mock\MMD\MapMyData\Definition\DefinitionInterface();

		$definition->getMockController()->getMapFields = function()
		{
			return [
				'id'    => [
					'A' => 'id_ref',
				],
				'foo'    => [
					'A' => 'foo',
					'B' => 'foo'
				],
				'bar'    => [
					'A' => 'BAR',
					'B' => 'baz'
				],
				'baz'    => [
					'A' => 'baz',
					'B' => 'bar'
				]
			];
		};

		$definition->getMockController()->getMapDestinations = function()
		{
			return ['A', 'B'];
		};

		$testedClass->setDefinition($definition);

		$dataSource = [
			'id'    => 'my id',
			'foo'   => 'foo data',
			'bar'   => 'bar data',
			'baz'   => 'baz data',
		];

		$result = $testedClass->mapArray($dataSource);

		$this->array($result)
			->isEqualTo([
				'A' => [
					'id_ref' => $dataSource['id'],
					'foo'    => $dataSource['foo'],
					'BAR'    => $dataSource['bar'],
					'baz'    => $dataSource['baz']
				],
				'B' => [
					'foo'    => $dataSource['foo'],
					'baz'    => $dataSource['bar'],
					'bar'    => $dataSource['baz']
				]
			]);
	}
}
