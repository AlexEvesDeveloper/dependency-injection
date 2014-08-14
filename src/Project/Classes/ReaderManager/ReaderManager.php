<?php

namespace Project\Classes\ReaderManager;

use Project\Classes\Readers;

class ReaderManager
{
	private $readerType;	

	public function setReaderType($readerType)
	{
		$this->readerType = $readerType;
	}
}