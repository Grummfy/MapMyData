<?php

namespace MMD\MapMyData\Mapper;

use MMD\MapMyData\Definition\DefinitionInterface;

interface MapperInterface
{
	/**
	 * @param DefinitionInterface $definition
	 *
	 * @return $this
	 */
	public function setDefinition(DefinitionInterface $definition);

	/**
	 * @param array $source
	 *
	 * @return array
	 */
	public function mapArray(array $source);
}
