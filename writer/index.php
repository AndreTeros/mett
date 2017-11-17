<?php
class PersonWriter {
	function writeName(Person $p){
		print $p->getName() . "\n";
	}

	function writeAge(Person $p){
		print $p->getAge() . "\n";
	}
}

class Person {
	private $writer;

	function __construct(PersonWriter $writer) {
		$this->writer = $writer;
	}

	function __call($methodname, $args) {
		if(method_exists($this->writer, $methodname)) {
			return $this->writer->$methodname($this);
		}
	}

	function getName() {return "Vasya";}
	function getAge() {return 22;}
}

$oPerson = new Person(new PersonWriter());
$oPerson->writeName();  // Vasya
$oPerson->writeAge();   // 22