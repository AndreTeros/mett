<?php
abstract class ApptEncoder {
	abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder {
	function encode() {
		return "format BloggsCal\n";
	}
}

class MegaApptEncoder extends ApptEncoder {
	function encode() {
		return "format MegaCal\n";
	}
}