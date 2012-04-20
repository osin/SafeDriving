<?php
include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$action = isset($_POST['action']) ? $_POST['action'] : null;
switch ($action) {
  case 'register':
    try{
      $vehicle = Vehicle::create(array('model' => $_POST['model'], 'type' => $_POST['type'], 'last_revision' => date('Y-m-d', time()), 'center_id' => $user->center_id));
      $_POST['action'] = null;
    }catch(Exception $e){print $e;}
    break;
  case 'delete':
    try{
      foreach ($_POST['vehicle'] as $vehicleID){
        $vehicle = Vehicle::find($vehicleID);
        $vehicle->delete();
      }
      $_POST['action'] = null;
    }catch(Exception $e){print $e;}
    break;
  case 'update':
    try{
      foreach ($_POST['vehicle'] as $vehicleID){
        $vehicle = Vehicle::find($vehicleID);
        $vehicle->update_attributes(array('last_revision' => date('Y-m-d', time())));
      }
      $_POST['action'] = null;
    }catch(Exception $e){print $e;}
    break;
  default:
      header("location:../office/manageVehicle.php");
    break;
}
?>
