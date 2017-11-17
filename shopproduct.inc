<?php
class ShopProduct {
//use PriceUtilities;
//use IdentityTrait;
private $title =                  "[Стандартный товар]";
private $producerMainName =       "[Фамилия автора]";
private $producerFirstName =      "[Имя автора]";
protected $price =                0;
private $discount =               0;
private $id =                     0;


public function __construct($title,$producerMainName,$producerFirstName,$price){
$this->title = $title;
$this->producerMainName = $producerMainName;
$this->producerFirstName = $producerFirstName;
$this->price = $price;
}

public function getProducer() {
return $this->producerFirstName . " " . $this->producerMainName;
}

public function getSummaryLine() {
$base  = "$this->title ($this->producerMainName, ";
$base .= "$this->producerFirstName)";
return $base;
}

public function setDiscount($num) {
$this->discount = $num;
}

public function getPrice() {
return ($this->price - $this->discount);
}

public function getTitle() {
return $this->title;
}

public function setId($id) {
$this->id = $id;
}

public static function getInstance($id, PDO $pdo) {
$stmt = $pdo->prepare("select * from products where id=?");
$result = $stmt->execute(array($id));
$row = $stmt->fetch();

if(empty($row)) return null;

if($row['type'] === "book"){
$product = new BookProduct (
$row['title'],
$row['firstname'],
$row['mainname'],
$row['price'],
$row['numpages']
);
} elseif($row['type'] === "cd") {
$product = new CDProduct (
$row['title'],
$row['firstname'],
$row['mainname'],
$row['price'],
$row['playlength']
);
} else {
$product = new ShopProduct (
$row['title'],
$row['firstname'],
$row['mainname'],
$row['price']
);
}

$product->setId($row['id']) ;
$product->setDiscount ($row['discount']);
return $product ;

}
}