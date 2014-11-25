<?php

namespace MMD\MapMyData\Mapper;

use MMD\MapMyData\Definition\DefinitionInterface;
use MMD\MapMyData\Mapper\Access\AccessInterface;
use MMD\MapMyData\Mapper\Access\ArrayToArrayAccess;

class DefaultMapper implements MapperInterface
{
	/**
	 * @var DefinitionInterface
	 */
	protected $_definition;

	// TODO change the name of this field
	/**
	 * @var array
	 */
	protected $_accesses = [];

	/**
	 * @var array
	 */
	protected $_results = [];

	/**
	 * @param DefinitionInterface $definition
	 *
	 * @return $this
	 */
	public function setDefinition(DefinitionInterface $definition)
	{
		$this->_definition = $definition;

		return $this;
	}

	/**
	 * @return DefinitionInterface
	 */
	public function getDefinition()
	{
		return $this->_definition;
	}

	/**
	 * Add a destination accessor/setter
	 * @param string $destination
	 * @param AccessInterface $access
	 *
	 * @return $this
	 */
	public function addAccess($destination, AccessInterface $access)
	{
		$this->_accesses[ $destination ] = $access;
		return $this;
	}

	/**
	 * @param array $accesses
	 *
	 * @return $this
	 */
	public function addAccesses(array $accesses)
	{
		foreach ($accesses as $destination => $access)
		{
			$this->addAccess($destination, $access);
		}

		return $this;
	}

	/**
	 * Map to array
	 * @param array $source
	 *
	 * @return array
	 */
	public function mapArray(array $source)
	{
		$this->_initResult();

		foreach ($this->_getDefinitionFields() as $field => $destination)
		{
			// treat source for the destination
			$this->_mapToDestination($destination, $field, $source, $destination);
		}

		return $this->_results;
	}

	/**
	 * @param array $destination
	 * @param string $field
	 * @param array $source
	 * @param array $destination
	 */
	protected function _mapToDestination($destination, $field, $source, $destination)
	{
		// treat source for the destination
		foreach ($destination as $alias => $destinationField)
		{
			if (!isset($this->_accesses[ $alias ]))
			{
				continue;
			}
			$this->_results[ $alias ] = $this->_accesses[ $alias ]->mapToDestination($source, $this->_results[ $alias ], $field, $destinationField);
		}
	}

	/**
	 * @return array
	 */
	protected function _getDefinitionFields()
	{
		return $this->_definition->getMapFields();
	}

	/**
	 * Initialize & reset results
	 */
	protected function _initResult()
	{
		$this->_results = [];
		foreach ($this->_definition->getMapDestinations() as $destinationKey)
		{
			$this->_results[ $destinationKey ] = [];
		}
	}
}
