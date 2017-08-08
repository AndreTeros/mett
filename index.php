<?php
require 'core.php';

$product1 = new ShopProduct("Собачье сердце", "Михаил", "Булгаков", 5.99);

//print "Автор: {$product1->getProducer()}";

$writer = new ShopProductWriter();

ShopProductWriter::write($product1);

