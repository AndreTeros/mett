<?php
//spl_autoload_register();
require 'core/main.php';

$comms = new BloggsCommsManager();
//$apptEnc = $comms->getApptEncoder();

echo "<pre>";

print $comms->getHeaderText();
print $comms->getApptEncoder()->encode();
print $comms->getFooterText();







echo "</pre>";