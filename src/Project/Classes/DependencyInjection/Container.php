<?php

namespace Project\Classes\DependencyInjection;

use Project\Classes\ReaderManager\ReaderManager;
use Project\Classes\Readers\JsonReader;

class Container
{
	// an array of existing instances, to ensure we don't recreate service objects that have already been created
	static protected $instances = array();
	// client code interacts with this container class directly, so any parameters that the service objects want, should be
	// passed into the Container
	protected $parameters = array();

	public function __construct(array $parameters = array())
	{
		$this->parameters = $parameters;
	}

	// returns a service object, which can then be injected into any other classes in this container that depend on it
	public function getReader()
	{
		// a bit of flexibility, you pass in the name of the Concrete Reader class when creating the Container
		$class = $this->parameters['reader.class'];

		$reader = new $class(array(
			'url' => $this->parameters['reader.url'],
			'max' => $this->parameters['reader.max'],
		));

		return $reader;
	}

	// returns a service object, which is dependent on the Reader class above. 
	public function getReaderManager()
	{
		// only ever want one instance...
		if(isset(self::$instances['reader_manager'])){
			return self::$instances['reader_manager'];
		}

		$rm = new ReaderManager();
		$rm->setReaderType($this->getReader());

		return self::$instances['reader_manager'] = $rm;
	}
}