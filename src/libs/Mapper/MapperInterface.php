<?php

namespace MMD\MapMyData\Mapper;

use MMD\MapMyData\Definition\DefinitionInterface;
use MMD\MapMyData\Mapper\Access\AccessInterface;

interface MapperInterface
{
	/**
	 * @param DefinitionInterface $definition
	 *
	 * @return $this
	 */
	public function setDefinition(DefinitionInterface $definition);

	/**
	 * @return DefinitionInterface
	 */
	public function getDefinition();

	/**
	 * @param array $source
	 *
	 * @return array
	 */
	public function mapArray(array $source);

	/**
	 * Add a destination accessor/setter
	 * @param string          $destination
	 * @param AccessInterface $access
	 *
	 * @return $this
	 */
	public function addAccess($destination, AccessInterface $access);

	/**
	 * Add multiple accessor/setter
	 * @see addAccess()
	 * @param array $accesses
	 *
	 * @return $this
	 */
	public function addAccesses(array $accesses);
}
