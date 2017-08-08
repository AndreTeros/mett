<?php
function foo($x, $y):int {
	return $x+$y;
}

var_dump(foo(2,3));

class Test {
	function foo($a) {
		return $a*2;
	}

}
