<?php
  require_once '../common/inc/init.inc';
  $users = User::find('all', array('conditions' => array('username' => strtolower($_POST['login']), 'password' => sha1($_POST['password']))));
  print_r($users);
  if (count($users)>0){
    $_SESSION['user'] = $users[0];
    if (count(!$users[0]->getPrivileges()) == 0) {
      header("location:/M1/index.php?error=true;");
    }
    header("location:/M1/public/hub.php");
  }
  else
    header("location:/M1/index.php?failed=true;");
?>