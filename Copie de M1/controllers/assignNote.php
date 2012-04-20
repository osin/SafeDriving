<?php
  include_once '../common/inc/init.inc';
if (!$user->isAuthorized('intervenant'))
  header("location:/M1/");
if (isset($_GET['session_id']))   {
  $session  = Session::find($_GET['session_id']);
  $pUsers = $session->find_participed_users();
}else
  $sessions = Session::find('all', array('conditions'=> array('user_id' => $user->id), 'order' => 'start desc'));
?>