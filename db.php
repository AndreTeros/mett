<?php
//$dsn = "sqlite:product.db";
//$pdo = new PDO($dsn);
//$stmt = $pdo->prepare("select * from products where id=?");
//$result = $stmt->execute(array(1));
//$row = $stmt->fetch();
//echo "<pre>";
//print_r($row);
//echo "</pre>";
//die();


$db = new SQLite3('product.db');

$querySelect = "SELECT * FROM `products`";
$queryUpd = "UPDATE `products`
	SET `mainname` = 'ДДТ'
	WHERE id = 2";

var_dump($db->exec($queryUpd));
$res = $db->query($querySelect);
while($row = $res->fetchArray(SQLITE3_ASSOC)) {
	echo "<pre>";
	print_r($row);
	echo "</pre>";
}

echo "<br>";
var_dump($db->lastErrorMsg());


//$pdo = new PDO();

//CREATE TABLE products (
//	id INTEGER PRIMARY KEY AUTOINCREMENT,
//			type ТЕХТ,
//			firstname ТЕХТ,
//			mainname ТЕХТ,
//			title ТЕХТ,
//			price float,
//			numpages int,
//			playlength int ,
//			discount
//	  )


//$query = "INSERT INTO `products`
//(`type`,`title`,`mainname`,`firstname`,`price`,`numpages`,`playlength`)
//VALUES
//('book','Собачье сердце', 'Михаил', 'Булгаков', 5.99, 250, NULL),
//('cd','Пропавший без вести', 'Группа', 'ДДТ', 10.99, NULL, 60.33);
//";

