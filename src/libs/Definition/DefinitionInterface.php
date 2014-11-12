<?php

namespace MMD\MapMyData\Definition;

interface DefinitionInterface
{
	/**
	 * Get the map field
	 * @return array
	 */
	public function getMapFields();

	/**
	 * Get all the map destination
	 * @return array
	 */
	public function getMapDestinations();
}
