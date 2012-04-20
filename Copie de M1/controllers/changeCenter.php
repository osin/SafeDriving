<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('direction'))
  header("location:/M1/");

$userList = User::find('all', array('conditions' => array('center_id'=>$user->center_id)));
$privileges = Privilege::find('all');
$centers = Center::find('all');
foreach ($userList as $pUser) {
  if (isset($_POST['center' . $pUser->id])) {
    $pUser->center_id = $_POST['center' . $pUser->id];
    $pUser->save();
  }
  if (isset($_POST['privilege_mode'])) {
    $pvlgs = UserPrivilege::find('all', array('conditions' => array('user_id' => $pUser->id)));
    if ($pUser->id != $user->id) {
    foreach ($pvlgs as $pvlg){
        $pvlg->delete();
      }
    }
    if (isset($_POST['privilege'.$pUser->id])) {
      foreach ($_POST['privilege' . $pUser->id] as $pp) {
        UserPrivilege::create(array('user_id' => $pUser->id, 'privilege_id' => $pp));
      }
    }
  }
  //ici
}
?>
