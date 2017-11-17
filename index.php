<?php
$starsScript = microtime(true);
require 'core.php';
$dsn = "sqlite:product.db";
$pdo = new \PDO($dsn);
//die();
//$product1 = new BookProduct("Собачье сердце", "Михаил", "Булгаков", 5.99, 250);
//$product2 = new CDProduct("Пропавший без вести", "Группа", "ДДТ", 10.99, 60.33);

$product1 = ShopProduct::getInstance(1,$pdo);
$product2 = ShopProduct::getInstance(2,$pdo);

$oTextProductWriter = new TextProductWriter();

$oTextProductWriter->addProduct($product1);
$oTextProductWriter->addProduct($product2);
$oTextProductWriter->write();

$prod_class = new ReflectionClass($product1);
echo "<pre>";
Reflection::export($prod_class);
echo "</pre>";
$timeScript = microtime(true)-$starsScript;
echo "<br>-----<br>" . $timeScript . "<br>-----<br>";
die();
var_dump($product1->calculateTax(333));


function incRule($c) {
//	var_dump(file_exists("E:\\PhpstormProjects\\mett55\\".$c));
//	die();
	include 'E:\PhpstormProjects\mett55'.$c;
}


spl_autoload_register();
$product1 = new ShopProduct("Собачье сердце", "Михаил", "Булгаков",88);

$p = new lib\additional\superinc\holder();


echo "<br>-----<br>" . microtime() - $starsScript . "<br>-----<br>";