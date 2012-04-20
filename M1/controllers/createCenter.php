<?php
include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$pUsers = User::find('all');
if (isset($_POST['action']) && $_POST['action'] == "register") {
  try{
    $center = Center::create(array('name' => $_POST['name'], 'description' => $_POST['description'], 'address' => $_POST['address'], 'user_id' => $_POST['user_id']));
    $_POST['action']=null;
  }catch(Exception $e){
    header("location:../office/createCenter.php?error=true;");
  }
}
?>
