<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$vehicles = Vehicle::find('all', array('conditions' => array('center_id' => $user->center_id)));
?>
