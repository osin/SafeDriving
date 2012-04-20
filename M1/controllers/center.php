<?php
include_once '../common/inc/init.inc';
$liste = isset($_GET['center']) ;
if ($liste)
  {
  $center = Center::find($_GET['center']);
  }
else {
  $liste=null;
$centers = Center::find('all');}

?>
