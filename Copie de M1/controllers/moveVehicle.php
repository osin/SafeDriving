<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$vehicles = Vehicle::find('all', array('conditions' => array('center_id' => $user->center_id)));
$centers = Center::find('all');
if (isset($_POST['center']) && $_POST['center'] != 0) {
  foreach ($_POST['vehicle'] as $vehicleID) {
    $vehicle = Vehicle::find($vehicleID);
    $vehicle->update_attributes(array('center_id' => $_POST['center']));
  }
  $_POST['center'] = null;
  header("location:../office/moveVehicle.php");
}
?>
