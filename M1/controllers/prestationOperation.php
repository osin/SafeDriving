<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$action = isset($_POST['action']) ? $_POST['action'] : null;
switch ($action) {
  case 'register':
    try {
      $prestation = Prestation::create(array('name' => $_POST['name'], 'description' => $_POST['description'], 'price' => $_POST['price']));
      $_POST['action'] = null;
    } catch (Exception $e) {
      print 'failed\n' . $e;
    };
    break;
  case 'delete':
    try {
      foreach ($_POST['prestation'] as $prestationID) {
        $prestation = Prestation::find($prestationID);
        $prestation->delete();
      }
    } catch (Exception $e) {
      print 'failed\n' . $e;
    };
    $_POST['action'] = null;
    break;
  case 'update':
    try {
      foreach ($_POST['prestation'] as $prestationID) {
        $prestation = Prestation::find($prestationID);
        $prestation->update_attributes(array('name' => $_POST['name' . $prestationID], 'description' => $_POST['description' . $prestationID], 'price' => $_POST['price' . $prestationID]));
      }
    } catch (Exception $e) {
      print 'failed\n' . $e;
    };
    $_POST['action'] = null;
    break;
  default:
    header("location:../office/manageprestation.php");
    break;
}
?>
