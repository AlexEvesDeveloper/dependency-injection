<?php

namespace Project\Classes\Readers;

class JsonReader
{

	private $params;

	public function __construct(array $params = array())
	{
		$this->params = $params;
	}
}