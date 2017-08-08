<?php
require 'core.php';

$product1 = new ShopProduct("Собачье сердце", "Михаил", "Булгаков", 5.99);
$product2 = new ShopProduct("Пропавший без вести", "Группа", "ДДТ", 10.99);

//print "Автор: {$product1->getProducer()}";

$writer = new ShopProductWriter();


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mett 7 | index</title>
</head>
<body>
	<pre><?php
			$writer->write($product1);
			$writer->write($product2);
		?>
	</pre>
</body>
</html>