<?php
trait TTest {
	public static $tt;

	public static function SetTT($v) {
		self::$tt = $v;
	}

	public function quad() {
		$this->a = $this->a*$this->a;
		$this->b = $this->b*$this->b;
		$this->c = $this->c*$this->c;
	}
}

trait TTest2 {
	use TTest;
}

trait TDump {
	function dump() {
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}

	public function quad() {
		$this->a = $this->a*2;
		$this->b = $this->b*2;
		$this->c = $this->c*2;
	}
}

class CTest {
	use TTest2,TDump {
		TTest2::quad insteadof TDump;
		TDump::quad as quad2;
	}
	private $a,$b,$c;
	public $d;

	public static $st = 1234;

	function __construct($a,$b,$c) {
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}

	function __set($f,$v) {
		echo "Ne namazivay";
	}
}

$oTest = new CTest(1,2,3);
$oTest->quad();
$oTest->quad2();