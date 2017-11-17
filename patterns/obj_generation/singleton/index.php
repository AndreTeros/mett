<?php
//require 'core\preferences.php';
spl_autoload_register();
use Core\Preferences;
$pref = Preferences::getinstance ( ) ;
$pref->setProperty("name", "Иван");
unset ($pref); // Удалим ссылку
$pref2 = Preferences::getinstance();

print $pref2->getProperty("name")."<br>";

//$pref3 = clone $pref2;
//
//$pref3->setProperty("name", "Колян");
//print $pref2->getProperty("name")."<br>";
//print $pref3->getProperty("name")."<br>";