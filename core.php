<?php
require 'icore.php';
class ShopProduct implements Chargeable, IdentityObject {
	use PriceUtilities;
	use IdentityTrait;
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

	public function getProducer():string {
		return $this->producerFirstName . " " . $this->producerMainName;
	}

	public function getSummaryLine():string {
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

	public static function getInstance(int $id, PDO $pdo):ShopProduct {
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

class BookProduct extends ShopProduct {
	private $numPages;

	function __construct($title, $producerMainName, $producerFirstName, $price, $numPages) {
		parent::__construct($title, $producerMainName, $producerFirstName, $price);
		$this->numPages = $numPages;
	}

	function getNumberOfPages() {
		return $this->numPages;
	}

	function getSummaryLine():string
	{
		$base  = parent::getSummaryLine();
		$base .= ": $this->numPages стр.";
		return $base;
	}
}

class CDProduct extends ShopProduct {
	private $playLength;

	function __construct($title, $producerMainName, $producerFirstName, $price, $playLength) {
		parent::__construct($title, $producerMainName, $producerFirstName, $price);
		$this->playLength = $playLength;
	}

	function getPlayLength() {
		return $this->playLength;
	}

	function getSummaryLine():string
	{
		$base  = parent::getSummaryLine();
		$base .= ": Время звучания - $this->playLength";
		return $base;
	}
}



abstract class ShopProductWriter {
	protected $products;

	public function addProduct(ShopProduct $shopProduct) {
		$this->products[] = $shopProduct;
	}

	abstract public function write();
}

class TextProductWriter extends ShopProductWriter {
	public function write() {
		$str = "Товары:\n";
		foreach($this->products as $shopProduct) {
			$str .= $shopProduct->getSummaryLine()."\n";
		}
		echo "<pre>";
		echo $str;
		echo "</pre>";
	}
}

trait PriceUtilities {
	private $taxrate = 20;

	function calculateTax($price) {
		return (($this->taxrate/100) * $price);
	}
}

trait IdentityTrait {
	public function generateId() {
		return uniqid();
	}
}

class ReflectionUtil {
	static function getClassSource(ReflectionClass $class) {
		$path = $class->getFileName();
		$lines = @file($path);
		$from = $class->getStartLine();
		$to = $class->getEndLine();
		$len = $to - $from + 1;
		return implode(array_slice($lines, $from - 1, $len));
	}
}
//print "<pre>" . ReflectionUtil::getClassSource(new ReflectionClass( 'CDProduct')) . "</pre>";