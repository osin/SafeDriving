<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$prestations = Prestation::find('all');
?>
