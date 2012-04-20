<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$offers = Offer::find('all');

$editmode = isset($_GET['offer']) ? true : false;

if ($editmode) {
  $offer = Offer::find($_GET['offer']);
  $prestations = Prestation::find('all');
}
?>
