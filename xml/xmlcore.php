<?php
class Conf {
	private $file;
	private $xml;
	private $lastmatch;

	function __construct($file) {
		if(!file_exists($file)) {
			throw new Exception("File not found");
		}

		$this->file = $file;
		$this->xml = simplexml_load_file($file);
	}

	function write() {
		file_put_contents($this->file,$this->xml->asXML());
	}

	function getXml() {
		return $this->xml;
	}
}

class FileException extends Exception { }
class ConfException extends Exception { }