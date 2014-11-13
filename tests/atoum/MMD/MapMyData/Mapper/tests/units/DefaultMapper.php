<?php

namespace MMD\MapMyData\Mapper\tests\units;

use MMD\MapMyData\Definition\DefinitionInterface;
use MMD\MapMyData\Mapper\Access\ArrayAccess;
use MMD\MapMyData\Mapper\Access\ComposedAccess;
use MMD\MapMyData\Mapper\DefaultMapper as TestedClass;

class DefaultMapper extends \atoum\test
{
	/**
	 * @dataProvider definitionDataProvider
	 */
	public function testSetterGetterOnDefinition(DefinitionInterface $definition)
	{
		$testedClass = new TestedClass();

		$this->object($testedClass->setDefinition($definition))->isEqualTo($testedClass);

		$this->object($testedClass->getDefinition())->isEqualTo($definition);
	}

	/**
	 * @dataProvider definitionDataProvider
	 */
	public function testMapToArray($definition)
	{
		$access = new ArrayAccess();
		$composedAccess = new ComposedAccess($access, $access);

		$testedClass = new TestedClass();
		$testedClass->addAccesses([
			'A' => $composedAccess,
			'B' => $composedAccess
		]);

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

	public function definitionDataProvider()
	{
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

		return array($definition);
	}
}
