<?php
abstract class CommsManager {
	abstract function getApptEncoder();
	abstract function getHeaderText();
	abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager {
	function  getApptEncoder() {
		return new BloggsApptEncoder();
	}

	function getHeaderText() {
		return "BloggsCal Header text\n";
	}

	function getFooterText() {
		return "BloggsCal Footer text\n";
	}
}

class MegaCommsManager extends CommsManager {
	function  getApptEncoder() {
		return new MegaApptEncoder();
	}

	function getHeaderText() {
		return "MegaCal Header text\n";
	}

	function getFooterText() {
		return "MegaCal Footer text\n";
	}
}