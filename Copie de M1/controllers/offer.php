<?php
include_once '../common/inc/init.inc';
$liste = isset($_GET['offer']) ;
if ($liste)
  {
  $offer = Offer::find($_GET['offer']);
  }
else {
  $liste=null;
$offers = Offer::find('all');}

?>
