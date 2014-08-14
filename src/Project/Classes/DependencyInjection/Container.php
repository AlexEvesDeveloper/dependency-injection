<?php

namespace Project\Classes\DependencyInjection;

use Project\Classes\ReaderManager\ReaderManager;
use Project\Classes\Readers\JsonReader;

class Container
{
	protected $parameters = array();

	public function __construct(array $parameters = array())
	{
		$this->parameters = $parameters;
	}

	public function getJsonReader()
	{
		return new JsonReader(array(
			'url' => $this->parameters['reader.url'],
			'max' => $this->parameters['reader.max'],
		));
	}

	public function getReaderManager()
	{
		$rm = new ReaderManager();
		$rm->setReaderType($this->getJsonReader());

		return $rm;
	}
}