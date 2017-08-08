<?php
class ShopProduct {
	public $title =                  "[Стандартный товар]";
	public $producerMainName =       "[Фамилия автора]";
	public $producerFirstName =      "[Имя автора]";
	public $price =                  0;


	public function __construct($title,$producerMainName,$producerFirstName,$price){
		$this->title = $title;
		$this->producerMainName = $producerMainName;
		$this->producerFirstName = $producerFirstName;
		$this->price = $price;
	}

	public function getProducer() {
		return $this->producerFirstName . " " . $this->producerMainName;
	}
}

class ShopProductWriter {
	public function write(ShopProduct $shopProduct) {
		$str = $shopProduct->title . ": " . $shopProduct->getProducer() . " (" . $shopProduct->price . ")\n";
		print $str;
	}
}