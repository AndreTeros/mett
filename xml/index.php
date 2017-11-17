<?php
require 'xmlcore.php';
try {
	$conf = new Conf("config1.xml");
} catch(Exception $e) {
	echo $e->getMessage();
}

echo "<pre>";
//print_r($conf->getXml());
echo "</pre>";


function foo($a) {
	try {
		if ($a > 10) {
			throw new FileException();
		}
		if ($a < 1) {
			throw new ConfException();
		}
		return $a*2;
	} catch (FileException $е) {
		echo "FileException";
	} catch (ConfException $е) {
		return false;					// finally отработает
	} finally {
		echo "<br>end<br>";
	}

}

var_dump(foo(0));