<?php
include_once '../common/inc/init.inc';
$liste = isset($_GET['vehicle']) ;
if ($liste)
  {
  $vehicle= Vehicle::find($_GET['vehicle']);
  }
else {
  $liste=null;
  $vehicles = Vehicle::find('all');}

?>

