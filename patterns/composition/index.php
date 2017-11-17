<?php
require 'core.php';
//$lessons[] = new Seminar (4, new TimedCostStrategy()) ;
//$lessons[] = new Lecture (4, new FixedCostStrategy()) ;
//foreach ($lessons as $lesson) {
//	print "Плата за занятие {$lesson->cost()}. ";
//	print "Тип оплаты : {$lesson->chargeType()} \n ";
//}

$a = new CTOne();
$b = new CTTwo();

$oMain = new CTMain($a, $b);


unset($oMain);
echo "<hr>---END SCRIPT---<hr>";