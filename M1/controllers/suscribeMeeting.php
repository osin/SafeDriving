<?php
include_once '../common/inc/init.inc';
if (!$user->isAuthorized('direction'))
  header("location:/M1/");
$sessions = Session::find('all', array('conditions'=> array('user_id' => $user->id), 'order' => 'start desc'));
if (isset($_GET['session_id']))   {
  $session  = Session::find($_GET['session_id']);
  $pUsers = User::find('all', array('conditions' => array('center_id' => $user->center_id)));
}
if (isset($_POST['action']) && $_POST['action'] == 'register')   {
  $session  = Session::find($_GET['session_id']);
  $pUsers = User::find('all', array('conditions' => array('center_id' => $user->center_id)));
  $_POST['action'] = null;
  if (isset($_POST['students'])){
    foreach($_POST['students'] as $student_id){
      UserSession::create(array('user_id' => $student_id, 'session_id' => $_GET['session_id']));
    }
  }
  //header("location:../office/suscribeMeeting.php");
}
?>