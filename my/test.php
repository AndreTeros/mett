<?php
//require 'itest.php';
//require '../core.php';
require 'core.php';
use Core\Some\Gg\Wp;
$n = new Wp\Hello();

echo $n->foobar();