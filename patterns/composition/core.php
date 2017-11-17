<?php

abstract class Lesson {
	private $duration;
	private $costStrategy;

	function __construct($duration, CostStrategy $costStrategy) {
		$this->duration = $duration;
		$this->costStrategy = $costStrategy;
	}

	function cost() {
		return $this->costStrategy->cost($this);
	}

	function chargeType() {
		return $this->costStrategy->chargeType();
	}

	function getDuration() {
		return $this->duration;
	}
}

class Lecture extends Lesson {
}

class Seminar extends Lesson {
}

abstract class CostStrategy {
	abstract function cost(Lesson $lesson);

	abstract function chargeType();
}

class TimedCostStrategy extends CostStrategy {
	function cost(Lesson $lesson) {
		return ($lesson->getDuration() * 5);
	}

	function chargeType() {
		return "Почасовая оплата";
	}
}

class FixedCostStrategy extends CostStrategy {
	function cost(Lesson $lesson) {
		return 30;
	}

	function chargeType() {
		return "Фиксированная ставка";
	}
}

// test

trait DieMotherFucker {
	function __destruct() {
		echo "object " . __CLASS__ . " is die<br>";
	}
}

class CTMain {
	use DieMotherFucker;

	public $one;
	public $two;

	function __construct($a, $b) {
		$this->one = $a;
		$this->two = $b;
	}

}

class CTOne {
	use DieMotherFucker;
}

class CTTwo {
	use DieMotherFucker;
}